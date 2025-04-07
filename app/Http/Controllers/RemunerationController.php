<?php

namespace App\Http\Controllers;

use App\Models\Remuneration;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class RemunerationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //recuperar os dados do BD
        $remunerations = Remuneration::with('role')->orderBy('role_id')->paginate(30);

        //Retornar para a view
        return view('remuneration.index', [
            'remunerations' => $remunerations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        // retorna para a view
        return view('remuneration.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Remuneration::create([
            'role_id' => $request->role_id,
            'salario_base' => str_replace(',', '.', str_replace('.', '', trim(preg_replace('/\s+/u', ' ', str_replace('R$', '', $request->salario_base))))),
            'inss' => $request->inss,
            'periculosidade' => $request->periculosidade,
            'alimentacao' => str_replace(',', '.', str_replace('.', '', trim(preg_replace('/\s+/u', ' ', str_replace('R$', '', $request->alimentacao))))),
            'transporte' => str_replace(',', '.', str_replace('.', '', trim(preg_replace('/\s+/u', ' ', str_replace('R$', '', $request->transporte))))),
        ]);

        return redirect()->route('remuneration.index')->with('success', 'Remuneração cadastrada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Remuneration $remuneration)
    {
        $remuneration->load('role'); // Carrega o relacionamento role
        return response()->json($remuneration);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Remuneration $remuneration)
    {

        //retornar para a view
        return view('remuneration.edit', [
            'remuneration' => $remuneration,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Remuneration $remuneration)
    {
        // dd($request);
        //editar dados no BD
        // dados do usuário
        $remuneration->update([
            'salario_base' => str_replace(['R$ ', '.'], ['', ''], $request->salario_base),
            'inss' => str_replace(',', '.', $request->inss),
            'periculosidade' => str_replace(',', '.', $request->periculosidade),
            'alimentacao' => str_replace(['R$ ', ','], ['', '.'], $request->alimentacao), // Correção aqui
            'transporte' => str_replace(['R$ ', ','], ['', '.'], $request->transporte), // Correção aqui
        ]);

        // redirecionar para a view
        return redirect()->route('remuneration.index')->with('success', 'Remuneração editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Remuneration $remuneration)
    {
        //
    }

    public function import()
    {
        //Retornar para a view
        return view('remuneration.import');
    }

    public function importremuneration(Request $request)
    {
        //recuperar os dados do BD
        $remunerations = Remuneration::orderBy('role_id')->get();

        // validar o arquivo
        $request->validate([
            'remuneration' => 'required|mimes:csv,txt|max:2048',

        ], [
            'remuneration.required' => 'É necessário escolher um arquivo para importar.',
            'remuneration.mimes' => 'Arquivo inválido. Necessário enviar um arquivo .csv.',
            'remuneration.max' => 'Tamanho do arquivo excede o :max MB',
        ]);

        // Ler o arquivo CSV
        $file = fopen($request->file('remuneration'), 'r');
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
            Remuneration::create([
                'role_id' => $data['role_id'],
                'salario_base' => $data['salario_base'],
                'inss' => $data['inss'],
                'periculosidade' => $data['periculosidade'],
                'alimentacao' => $data['alimentacao'],
                'transporte' => $data['transporte'],
            ]);
        }

        //Retornar para a view
        return view('remuneration.index', ['remunerations' => $remunerations])->with('success', 'Dados de remuneração importados com sucesso');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $remunerations = Remuneration::where(function ($query) use ($search) {
            $query->where('salario_base', 'like', "%$search%")
                ->orWhere('inss', 'like', "%$search%")
                ->orWhere('periculosidade', 'like', "%$search%")
                ->orWhere('alimentacao', 'like', "%$search%")
                ->orWhere('transporte', 'like', "%$search%")
                ->orWhereHas('role', function ($roleQuery) use ($search) {
                    $roleQuery->where('funcao', 'like', "%$search%");
                });
        })
            ->with('role') // Carrega o relacionamento role
            ->paginate(30);

        return view('remuneration.index', compact('remunerations'));
    }
}
