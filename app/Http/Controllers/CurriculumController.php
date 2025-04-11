<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\{Dependente, Hire, Role};
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curricula = Curriculum::with('role')->paginate(30);
        return view('curricula.index', compact('curricula'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Buscar as funções excluindo os IDs especificados
        $roles = Role::whereNotIn('id', [15, 16, 17, 20, 21, 22, 23, 24, 25, 26, 27, 28, 32, 33])
            ->get();
        //Retornar para a view
        return view('curricula.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // dados do currículo
            $curriculum = Curriculum::create([
                'role_id' => $request->role_id,
                'name' => $request->name,
                'endereco' => $request->endereco,
                'numero' => $request->numero,
                'complemento' => $request->complemento,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'estado' => $request->estado,
                'cep' => preg_replace('/[^0-9]/', '', $request->cep),
                'telefone' => preg_replace('/[^0-9]/', '', $request->telefone),
                'email' => $request->email,
                'nascimento' => $request->nascimento,
                'naturalidade' => $request->naturalidade,
                'nacionalidade' => $request->nacionalidade,
                'genero' => $request->genero,
                'escolaridade' => $request->escolaridade,
                'raca' => $request->raca,
                'civil' => $request->civil,
                'cpf' => preg_replace('/[^0-9]/', '', $request->cpf),
                'pis_pasep' => preg_replace('/[^0-9]/', '', $request->pis),
                'titulo_eleitor' => preg_replace('/[^0-9]/', '', $request->titulo),
                'zona' => $request->zona,
                'secao' => $request->secao,
                'ctps' => preg_replace('/[^0-9]/', '', $request->ctps),
                'cnh' => preg_replace('/[^0-9]/', '', $request->cnh),
                'catcnh' => $request->catcnh,
                'anterior' => $request->anterior,
                'funcao_anterior' => $request->funcao_anterior,
                'empresa' => $request->empresa,
                'periodo_inicio' => $request->periodo_inicio,
                'periodo_termino' => $request->periodo_termino,
                'carteira' => $request->carteira,
                'indicacao' => $request->indicacao,
                'quem' => $request->quem,
            ]);

            // Retornar para a view com mensagem de sucesso
            return redirect()->route('curricula.message')->with('success', 'Currículo cadastrado com sucesso!');
        } catch (\Exception $e) {
            // Registrar o erro no log
            Log::error('Erro ao cadastrar currículo: ' . $e->getMessage() . "\n" . $e->getTraceAsString());
    
            // Retornar para a view com uma mensagem genérica de erro
            return redirect()->route('curricula.message')->with('error', 'Ocorreu um erro ao cadastrar o currículo. Por favor, tente novamente.'. $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Curriculum $curriculum)
    {
        $curriculum->load('role');
        return view('curricula.show', compact('curriculum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curriculum $curriculum) {
        
        $curriculum->load('role');
        $lotacao = Hire::all()->pluck('sigla', 'id');
        $roles = Role::whereNotIn('id', [15, 16, 17, 20, 21, 22, 23, 24, 25, 26, 27, 28, 32, 33])
            ->get();
        return view('curricula.edit', compact('curriculum', 'lotacao', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curriculum $curriculum)
    {
        try {
            // dados do currículo
            $curriculum -> update([
                'role_id' => $request->role_id,
                'name' => $request->name,
                'endereco' => $request->endereco,
                'numero' => $request->numero,
                'complemento' => $request->complemento,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'estado' => $request->estado,
                'cep' => preg_replace('/[^0-9]/', '', $request->cep),
                'telefone' => preg_replace('/[^0-9]/', '', $request->telefone),
                'email' => $request->email,
                'nascimento' => $request->nascimento,
                'naturalidade' => $request->naturalidade,
                'nacionalidade' => $request->nacionalidade,
                'genero' => $request->genero,
                'escolaridade' => $request->escolaridade,
                'raca' => $request->raca,
                'civil' => $request->civil,
                'cpf' => preg_replace('/[^0-9]/', '', $request->cpf),
                'pis_pasep' => preg_replace('/[^0-9]/', '', $request->pis),
                'titulo_eleitor' => preg_replace('/[^0-9]/', '', $request->titulo),
                'zona' => $request->zona,
                'secao' => $request->secao,
                'ctps' => preg_replace('/[^0-9]/', '', $request->ctps),
                'cnh' => preg_replace('/[^0-9]/', '', $request->cnh),
                'catcnh' => $request->catcnh,
                'calca' => $request->calca,
                'camisa' => $request->camisa,
                'calcado' => $request->calcado,
                'nr10' => $request->nr10,
                'dependentes' => $request->dependentes,
                'numeroDependentes' => $request->numeroDependentes,
                'status' => $request->status,
                'anterior' => $request->anterior,
                'funcao_anterior' => $request->funcao_anterior,
                'empresa' => $request->empresa,
                'periodo_inicio' => $request->periodo_inicio,
                'periodo_termino' => $request->periodo_termino,
                'carteira' => $request->carteira,
                'indicacao' => $request->indicacao,
                'quem' => $request->quem,
            ]);

            // Salvar os dependentes
            if ($request->input('dependentes') == 1 && $request->has('dependente')) {
                foreach ($request->input('dependente') as $dependenteData) {
                    Dependente::create([
                        'curriculum_id' => $curriculum->id,
                        'nome' => $dependenteData['nome'],
                        'cpf' => preg_replace('/[^0-9]/', '', $dependenteData['cpf']),
                        'data_nascimento' => $dependenteData['dataNascimento'],
                    ]);
                }
            }

            // Retornar para a view com mensagem de sucesso
            return redirect()->route('curricula.index')->with('success', 'Dados atualizados com sucesso!');
        } catch (\Exception $e) {
            // Registrar o erro no log
            Log::error('Erro ao atualizar currículo ID ' . $curriculum->id . ': ' . $e->getMessage() . "\n" . $e->getTraceAsString());
    
            // Retornar para a view com uma mensagem genérica de erro
            return redirect()->route('curricula.index')->with('error', 'Ocorreu um erro ao atualizar os dados: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curriculum $curriculum)
    {
        //apagar dado do BD
        $curriculum->delete();
        // redirecionar para a view
        return redirect()->route('curricula.index')->with('success', 'Curriculo apagado com sucesso!');
    }

    public function showDocument(Curriculum $curriculum)
    {
        // Retornar para a view com os dados
        return view('curricula.document', ['curriculum' => $curriculum]);
    }

    public function generatePdf(Curriculum $curriculum)
    {
        // Gerar PDF com os dados
        $pdf = Pdf::loadView('curricula.document', ['curriculum' => $curriculum]);

        // Retornar o PDF para download
        return $pdf->download('curriculo ' . $curriculum->id . '.pdf');
    }

    public function message()
    {
        return view('curricula.message');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $curricula = Curriculum::query()
            ->join('roles', 'curricula.role_id', '=', 'roles.id')
            ->where('roles.funcao', 'like', "%$search%")
            ->orWhere('curricula.name', 'like', "%$search%")
            ->orWhere('curricula.endereco', 'like', "%$search%")
            ->orWhere('curricula.numero', 'like', "%$search%")
            ->orWhere('curricula.complemento', 'like', "%$search%")
            ->orWhere('curricula.bairro', 'like', "%$search%")
            ->orWhere('curricula.cidade', 'like', "%$search%")
            ->orWhere('curricula.estado', 'like', "%$search%")
            ->orWhere('curricula.cep', 'like', "%$search%")
            ->orWhere('curricula.telefone', 'like', "%$search%")
            ->orWhere('curricula.email', 'like', "%$search%")
            ->orWhere('curricula.nascimento', 'like', "%$search%")
            ->orWhere('curricula.naturalidade', 'like', "%$search%")
            ->orWhere('curricula.nacionalidade', 'like', "%$search%")
            ->orWhere('curricula.genero', 'like', "%$search%")
            ->orWhere('curricula.escolaridade', 'like', "%$search%")
            ->orWhere('curricula.raca', 'like', "%$search%")
            ->orWhere('curricula.civil', 'like', "%$search%")
            ->orWhere('curricula.cpf', 'like', "%$search%")
            ->orWhere('curricula.pis_pasep', 'like', "%$search%")
            ->orWhere('curricula.titulo_eleitor', 'like', "%$search%")
            ->orWhere('curricula.zona', 'like', "%$search%")
            ->orWhere('curricula.secao', 'like', "%$search%")
            ->orWhere('curricula.cnh', 'like', "%$search%")
            ->orWhere('curricula.catcnh', 'like', "%$search%")
            ->orWhere('curricula.ctps', 'like', "%$search%")
            ->paginate(30);

        return view('curricula.index', compact('curricula'));
    }
}
