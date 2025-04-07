<?php

namespace App\Http\Controllers;

use App\Models\{GrupoInsumo, Insumo, SubgrupoInsumo};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //acesso ao bd
        $perPage = 30;
        $page = $request->input('page', 1 );
        $insumos = Insumo::with(['grupo', 'subgrupo'])->paginate($perPage, ['*'], 'page' , $page);
        //retorna para a página
        return view('insumos.index', compact('insumos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //recuperar os dados do BD
        $grupos = GrupoInsumo::orderBy('grupo')->get();
        $subgrupos = SubgrupoInsumo::orderBy('subgrupo')->get();
        // retorna para a view
        return view('insumos.create', [
            'grupos' => $grupos,
            'subgrupos' => $subgrupos,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        Insumo::create([
            'grupo_id' => $request->grupo_id,
            'subgrupo_id' => $request->subgrupo_id,
            'codigo' => $request->codigo,
            'sinapi' => $request->sinapi,
            'descricao' => $request->descricao,
            'referencia' => $request->referencia,
            'unidade' => $request->unidade,
            'valor' => str_replace(',', '.', str_replace('.', '', trim(preg_replace('/\s+/u', ' ', str_replace('R$', '', $request->valor))))),
            // 'imagem' => $request->imagem,
        ]);

        // redirecionar para a view
        return redirect()->route('insumos.index')->with('success', 'Insumo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Insumo $insumo)
    {
        //retornar para a view
        $insumo->load('grupo', 'subgrupo');
        return view('insumos.show', ['insumo' => $insumo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insumo $insumo)
    {
        //recuperar os dados do BD
        $grupos = GrupoInsumo::orderBy('grupo')->get();
        $subgrupos = SubgrupoInsumo::orderBy('subgrupo')->get();
        //retornar para a view
        return view('insumos.edit', [
            'insumo' => $insumo,
            'grupos' => $grupos,
            'subgrupos' => $subgrupos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Insumo $insumo)
    {
        $insumo->update([
            'grupo_id' => $request->grupo_id,
            'subgrupo_id' => $request->subgrupo_id,
            'codigo' => $request->codigo,
            'sinapi' => $request->sinapi,
            'descricao' => $request->descricao,
            'referencia' => $request->referencia,
            'unidade' => $request->unidade,
            'valor' => str_replace(',', '.', str_replace('.', '', trim(preg_replace('/\s+/u', ' ', str_replace('R$', '', $request->valor))))),
            'imagem' => $request->imagem,
        ]);

        // redirecionar para a view
        return redirect()->route('insumos.index')->with('success', 'Insumo editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insumo $insumo)
    {
        //apagar dado do BD
        $insumo->delete();
        // redirecionar para a view
        return redirect()->route('insumos.index')->with('success', 'Insumo apagado com sucesso!');
    }

    public function import()
    {
        //Retornar para a view
        return view('insumos.import');
    }

    public function importinsumo(Request $request)
    {
        //recuperar os dados do BD
        $insumos = Insumo::orderBy('id')->get();

        // validar o arquivo
        $request->validate([
            'insumo' => 'required|mimes:csv,txt|max:2048',

        ], [
            'insumo.required' => 'É necessário escolher um arquivo para importar.',
            'insumo.mimes' => 'Arquivo inválido. Necessário enviar um arquivo .csv.',
            'insumo.max' => 'Tamanho do arquivo excede o :max MB',
        ]);

        // Ler o arquivo CSV
        $file = fopen($request->file('insumo'), 'r');
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
            Insumo::create([
                'grupo_id' => $data['grupo_id'],
                'subgrupo_id' => $data['subgrupo_id'],
                'sinapi' => $data['sinapi'],
                'codigo' => $data['codigo'] ?? null,
                'descricao' => $data['descricao'],
                'referencia' => $data['referencia'],
                'unidade' => $data['unidade'],
                'valor' => $data['valor'],
                'imagem' => $data['imagem'],
            ]);
        }

        //Retornar para a view
        return redirect()->route('insumos.index', ['insumos' => $insumos])->with('success', 'Insumos importados com sucesso');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $insumos = Insumo::when($search, function ($query, $search) {
            return $query->where('descricao', 'like', "%{$search}%")
                ->orWhere('sinapi', 'like', "%{$search}%")
                ->orWhereHas('grupo', function ($query) use ($search) {
                    $query->where('grupo', 'like', "%{$search}%");
                })
                ->orWhereHas('subgrupo', function ($query) use ($search) {
                    $query->where('subgrupo', 'like', "%{$search}%");
                });
        })->paginate(30);

        return view('insumos.index', compact('insumos'));
    }
}
