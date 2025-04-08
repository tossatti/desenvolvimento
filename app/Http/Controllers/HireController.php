<?php

namespace App\Http\Controllers;

use App\Models\Hire;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class HireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //acesso ao bd
        $perPage = 30;
        $page = $request->input('page', 1);
        $hires = Hire::paginate($perPage, ['*'], 'page', $page);
        //retorna para a página
        return view('hires.index', compact('hires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('hires.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contrato = Hire::create([
            'cno' => $request->cno,
            'sigla' => $request->sigla,
            'objeto' => $request->objeto,
            'tipo' => $request->tipo,
            'contrato' => $request->contrato,
            'contratante' => $request->contratante,
            'cnpj' => $request->cnpj,
            'valor' => str_replace(',', '.', str_replace('.', '', trim(preg_replace('/\s+/u', ' ', str_replace('R$', '', $request->valor))))),
            'vigencia' => $request->vigencia,
            'inicio' => $request->inicio,
            'termino' => $request->termino,
            'gestor ' => $request->gestor,
            'auxiliar' => $request->auxiliar,
            'status' => $request->status,
        ]);

        // redirecionar para a view
        return redirect()->route('hires.index')->with('success', 'Contrato cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hire $hire)
    {
        $hire->load('gestor', 'auxiliar');
        return view('hires.show', compact('hire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hire $hire)
    {
        $users = User::all();
        return view('hires.edit', compact('hire', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hire $hire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hire $hire)
    {
        //apagar dado do BD
        $hire->delete();
        // redirecionar para a view
        return redirect()->route('hires.index')->with('success', 'Contrato apagado com sucesso!');
    }

    public function import()
    {
        //Retornar para a view
        return view('hires.import');
    }

    public function importhire(Request $request)
    {
        //recuperar os dados do BD
        $hires = Hire::orderBy('id')->get();

        // // validar o arquivo
        // $request->validate([
        //     $fieldName => 'required|mimes:csv,txt|max:2048',

        // ], [
        //     $fieldName.'.required' => 'É necessário escolher um arquivo para importar.',
        //     $fieldName.'.mimes' => 'Arquivo inválido. Necessário enviar um arquivo .csv.',
        //     $fieldName.'.max' => 'Tamanho do arquivo excede o :max MB',
        // ]);

        // Ler o arquivo CSV
        $file = fopen($request->file('hire'), 'r');
        $headers = fgetcsv($file, 1000, ";"); // Ler o cabeçalho
        // Remover o BOM do primeiro cabeçalho, se presente
        if (substr($headers[0], 0, 3) == "\xEF\xBB\xBF") {
            $headers[0] = substr($headers[0], 3);
        }
        $arrayValues = [];

        // Iterar sobre as linhas do CSV
        while (($row = fgetcsv($file, 1000, ";")) !== FALSE) {
            // Verificar se o número de colunas corresponde
            if (count($headers) === count($row)) {
                // Combinar cabeçalhos e valores
                $rowData = array_combine($headers, $row);

                // Tratar valores 'null'
                foreach ($rowData as $key => $value) {
                    if (strtolower($value) === 'null') {
                        $rowData[$key] = null;
                    }
                }

                // Adicionar dados ao array de valores
                $arrayValues[] = $rowData;
            } else {
                // Lidar com linhas com número incorreto de colunas
                Log::error('Linha com número incorreto de colunas: ' . implode(';', $row));
            }
        }
        fclose($file);

        // dd($arrayValues);

        // Inserir os registros no banco de dados
        foreach ($arrayValues as $data) {
            Hire::create([
                'cno' => $data['cno'],
                'codigo' => $data['codigo'] ?? null,
                'sigla' => $data['sigla'],
                'objeto' => $data['objeto'],
                'tipo' => $data['tipo'],
                'contrato' => $data['contrato'],
                'contratante' => $data['contratante'],
                'cnpj' => $data['cnpj'],
                'valor' => $data['valor'],
                'vigencia' => $data['vigencia'],
                'inicio' => $data['inicio'],
                'termino' => $data['termino'],
                'gestor' => $data['gestor'],
                'auxiliar' => $data['auxiliar'],
                'status' => $data['status'],
            ]);
        }

        //Retornar para a view
        return redirect()->route('hires.index', ['hires' => $hires])->with('success', 'Dados importados com sucesso');
    }

    public function showDocument(Hire $hire)
    {
        // Retornar para a view com os dados do Hire
        return view('hires.document', ['hire' => $hire]);
    }

    public function generatePdf(Hire $hire)
    {
        // Gerar PDF com os dados do Hire
        $pdf = Pdf::loadView('hires.document', ['hire' => $hire]);

        // Retornar o PDF para download
        return $pdf->download('documento_contrato_' . $hire->id . '.pdf');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $hires = Hire::where('cno', 'like', "%$search%")
            ->orWhere('codigo', 'like', "%$search%")
            ->orWhere('sigla', 'like', "%$search%")
            ->orWhere('objeto', 'like', "%$search%")
            ->orWhere('tipo', 'like', "%$search%")
            ->orWhere('contrato', 'like', "%$search%")
            ->orWhere('contratante', 'like', "%$search%")
            ->orWhere('cnpj', 'like', "%$search%")
            ->orWhere('valor', 'like', "%$search%")
            ->orWhere('vigencia', 'like', "%$search%")
            ->orWhere('inicio', 'like', "%$search%")
            ->orWhere('termino', 'like', "%$search%")
            // Busca pelo nome do gestor através do relacionamento
            ->orWhereHas('gestor', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            // Busca pelo nome do auxiliar através do relacionamento
            ->orWhereHas('auxiliar', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->paginate(30);

        return view('hires.index', compact('hires'));
    }
}
