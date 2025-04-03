<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\{Adress, BancAcount, Contrato, ESocial, Hire, PersonalDocument, Role, User};
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $perPage = 30; // Defina o número de itens por página
        $users = User::orderBy('name')->paginate($perPage);

        // Retornar para a view
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        // recuperar informações do banco de dados
        $docs = (User::find($user->id)->documentos()->get())->first();
        $adress = (User::find($user->id)->adress()->get())->first();
        $banco = (User::find($user->id)->bancario()->get())->first();
        $contrato = (User::find($user->id)->contrato()->get())->first();
        $esocial = (User::find($user->id)->esocial()->get())->first();
        $roles = (User::find($user->id)->role()->get())->first();
        //retornar para a view
        return view('users.show', [
            'user' => $user,
            'docs' => $docs,
            'adress' => $adress,
            'banco' => $banco,
            'contrato' => $contrato,
            'esocial' => $esocial,
            'roles' => $roles,
        ]);
    }

    public function create()
    {
        $roles = Role::all();
        $lotacao = Hire::all()->pluck('sigla', 'id');
        // retorna para a view
        return view('users.create', compact('roles', 'lotacao'));
    }

    public function store(UserRequest $request)
    {
        dd($request);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|string|min:8',
        ]);

        //cadastrar usuário
        // dados pessoais
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'nascimento' => $request->nascimento,
            'naturalidade' => $request->naturalidade,
            'nacionalidade' => $request->nacionalidade,
            'genero' => $request->genero,
            'escolaridade' => $request->escolaridade,
            'raca' => $request->raca,
            'civil' => $request->civil,
            'calca' => $request->calca,
            'camisa' => $request->camisa,
            'calcado' => $request->calcado,
            'nr10' => $request->nr10,
            'dependentes' => $request->dependentes,
            'numeroDependentes' => $request->numeroDependentes,
        ]);

        // documentos pessoais
        PersonalDocument::create([
            'user_id' => $user->id,
            'cpf' => preg_replace('/[^0-9]/', '', $request->cpf),
            'pis_pasep' => preg_replace('/[^0-9]/', '', $request->pis),
            'titulo_eleitor' => preg_replace('/[^0-9]/', '', $request->titulo),
            'zona' => $request->zona,
            'secao' => $request->secao,
            'cnh' => preg_replace('/[^0-9]/', '', $request->cnh),
            'catcnh' => $request->catchn,
            'ctps' => preg_replace('/[^0-9]/', '', $request->ctps),
        ]);

        // dados bancários
        BancAcount::create([
            'user_id' => $user->id,
            'banco' => $request->banco,
            'agencia' => $request->agencia,
            'tipo_conta' => $request->tipo_conta,
            'numero_conta ' => $request->numero_conta,
            'tipo_pix' => $request->tipo_pix,
            'pix' => $request->pix,
        ]);

        // endereço
        Adress::create([
            'user_id' => $user->id,
            'endereco' => $request->endereco,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
            'telefone' => $request->telefone,
        ]);

        // contrato
        Contrato::create([
            'user_id' => $user->id,
            'remuneration_id ' => $request->remuneration_id,
            'role_id' => $request->role_id,
            'tipoContrato' => $request->tipoContrato,
            'lotacao' => $request->lotacao,
            'equipe' => $request->equipe,
            'cbo' => $request->cbo,
            'situacao' => $request->situacao,
            'disponibilidade' => $request->disponibilidade,
            'aso' => $request->aso,
            'admissao' => $request->admissao,
            'termino' => $request->termino,
            'observacao' => $request->observacao,
        ]);

        // e-social
        ESocial::create([
            'user_id' => $user->id,
            'matricula' => $request->matricula,
            'nocivos' => $request->nocivos,
            'admissional' => $request->admissionais,
            'periodicos' => $request->periodicos,
            'mudanca' => $request->mudanca,
            'retorno' => $request->retorno,
            'demissional' => $request->demissional,
        ]);

        // redirecionar para a view
        return redirect()->route('users.index')->with('success', 'Colaborador cadastrado com sucesso!');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $lotacao = Hire::all()->pluck('sigla', 'id');
        //recuperar os dados do BD
        $docs = (User::find($user->id)->documentos()->get())->first();
        $adress = (User::find($user->id)->adress()->get())->first();
        $banco = (User::find($user->id)->bancario()->get())->first();
        $contrato = (User::find($user->id)->contrato()->get())->first();
        $esocial = (User::find($user->id)->esocial()->get())->first();
        $funcao = (User::find($user->id)->role()->get())->first();

        //retornar para a view
        return view('users.edit', [
            'user' => $user,
            'docs' => $docs,
            'adress' => $adress,
            'banco' => $banco,
            'contrato' => $contrato,
            'esocial' => $esocial,
            'roles' => $roles,
            'funcao' => $funcao,
            'lotacao' => $lotacao,
        ]);
    }

    public function update(UserRequest $request, User $user, PersonalDocument $docs)
    {

        // //validar o formulário

        // recupera informaçoes do banco de dados
        $docs = (User::find($user->id)->documentos()->get())->first();
        $adress = (User::find($user->id)->adress()->get())->first();
        $banco = (User::find($user->id)->bancario()->get())->first();
        $contrato = (User::find($user->id)->contrato()->get())->first();
        $esocial = (User::find($user->id)->esocial()->get())->first();


        //editar dados no BD

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:6',
        ]);
        // dados do usuário
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'nascimento' => $request->nascimento,
            'naturalidade' => $request->naturalidade,
            'nacionalidade' => $request->nacionalidade,
            'genero' => $request->genero,
            'escolaridade' => $request->escolaridade,
            'raca' => $request->raca,
            'civil' => $request->civil,
            'calca' => $request->calca,
            'camisa' => $request->camisa,
            'calcado' => $request->calcado,
            'nr10' => $request->nr10,
            'dependentes' => $request->dependentes,
            'numeroDependentes' => $request->numeroDependentes,
        ]);

        // Atualiza a senha apenas se ela foi fornecida
        if ($request->filled('password')) {
            $user->update([
                'password' => bcrypt($request->password), // Criptografa a nova senha
            ]);
        }

        // atualiza informações no banco de dados
        // documentos pessoais 
        $docs->update([
            'cpf' => preg_replace('/[^0-9]/', '', $request->cpf),
            'pis_pasep' => preg_replace('/[^0-9]/', '', $request->pis),
            'titulo_eleitor' => preg_replace('/[^0-9]/', '', $request->titulo),
            'zona' => $request->zona,
            'secao' => $request->secao,
            'cnh' => preg_replace('/[^0-9]/', '', $request->cnh),
            'catcnh' => $request->catchn,
            'ctps' => preg_replace('/[^0-9]/', '', $request->ctps),
        ]);

        // dados bancários
        $banco->update([
            'banco' => $request->banco,
            'agencia' => $request->agencia,
            'tipo_conta' => $request->tipoconta,
            'numero_conta' => $request->numeroConta,
            'tipo_pix' => $request->tipopix,
            'pix' => $request->pix,
        ]);

        // endereço
        $adress->update([
            'endereco' => $request->endereco,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
            'telefone' => $request->telefone,
        ]);

        // Contrato
        $contrato->update([
            'tipoContrato' => $request->tipoContrato,
            'lotacao' => $request->lotacao,
            'equipe' => $request->equipe,
            'role_id' => $request->role_id,
            'remuneracao' => str_replace(',', '.', str_replace('.', '', trim(preg_replace('/\s+/u', ' ', str_replace('R$', '', $request->remuneracao))))),
            'cbo' => $request->cbo,
            'situacao' => $request->situacao,
            'disponibilidade' => $request->disponibilidade,
            'aso' => $request->aso,
            'admissao' => $request->admissao,
            'termino' => $request->termino,
            'observacao' => $request->observacao,
        ]);

        // e-social
        $esocial->update([
            'matricula' => $request->matricula,
            'nocivos' => $request->nocivos,
            'admissional' => $request->admissionais,
            'periodicos' => $request->periodicos,
            'mudanca' => $request->mudanca,
            'retorno' => $request->retorno,
            'demissional' => $request->demissional,
        ]);

        // redirecionar para a view
        return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Colaborador editado com sucesso!');
    }

    public function destroy(User $user)
    {
        //apagar usuário do BD
        $user->delete();
        // redirecionar para a view
        return redirect()->route('users.index')->with('success', 'Colaborador apagado com sucesso!');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $users = User::where('name', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhereHas('adress', function ($query) use ($search) {
                $query->where('endereco', 'like', "%$search%")
                    ->orWhere('cidade', 'like', "%$search%")
                    ->orWhere('estado', 'like', "%$search%");
            })
            ->orWhereHas('bancario', function ($query) use ($search) {
                $query->where('banco', 'like', "%$search%")
                    ->orWhere('agencia', 'like', "%$search%")
                    ->orWhere('tipo_conta', 'like', "%$search%");
            })
            ->orWhereHas('contrato', function ($query) use ($search) {
                $query->where('equipe', 'like', "%$search%")
                    ->orWhereHas('role', function ($roleQuery) use ($search) {
                        $roleQuery->where('funcao', 'like', "%$search%");
                    });
            })
            ->orWhereHas('esocial', function ($query) use ($search) {
                $query->where('matricula', 'like', "%$search%");
            })
            ->paginate(30);

        return view('users.index', compact('users'));
    }

    public function import()
    {
        //Retornar para a view
        return view('users.import');
    }

    public function importdata(Request $request)
    {
        //recuperar os dados do BD
        $users = User::orderBy('name')->get();

        // validar o arquivo
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048',

        ], [
            'file.required' => 'É necessário escolher um arquivo para importar.',
            'file.mimes' => 'Arquivo inválido. Necessário enviar um arquivo .csv.',
            'file.max' => 'Tamanho do arquivo excede o :max MB',
        ]);

        // criar array com colunas do banco de dados
        $headers = ['name', 'email', 'password'];

        // receber os dados do arquivo
        $dataFile = array_map('str_getcsv', file($request->file('file')));

        //emails já registrados
        $emailAlredyRegistered = false;

        // percorrer as linhas do array
        foreach ($dataFile as $keyData => $row) {
            // converter a linha em array
            $values = explode(';', $row[0]);

            // percorrer as colunas do cabeçalho
            foreach ($headers as $key => $header) {

                // atribuir os valores
                $arrayValues[$keyData][$header] = $values[$key];

                // verificar e-mail
                if ($header == 'email') {
                    // verificar se já cadastrado
                    if (User::where('email', $arrayValues[$keyData]['email'])->first()) {
                        // listar já cadastrados
                        $emailAlredyRegistered .= $arrayValues[$keyData]['email'] . ",";
                    }
                }

                // criptografar a senha
                if ($header == "password") {
                    $arrayValues[$keyData][$header] = Hash::make($arrayValues[$keyData]['password'], ['rounds' => 12]);
                    // // senha randômica
                    // $arrayValues[$keyData][$header] = Hash::make(Str::random(6), ['rounds' => 12]);
                }
            }
        }

        // Caso e-mail já tenha sido cadastrado, retornar com mensagem e não salvar no banco de dados
        if ($emailAlredyRegistered) {
            return back()->with('error', 'Dados não importados. Existem e-mails já cadastrados: ' . $emailAlredyRegistered);
        }
        // dd($arrayValues);
        // cadastrar os registros no banco de dados
        User::insert($arrayValues);
        //Retornar para a view
        return view('users.index', ['users' => $users]);
    }

    public function importdocdata(Request $request)
    {
        //recuperar os dados do BD
        $users = User::orderBy('name')->get();

        // validar o arquivo
        $request->validate([
            'doc' => 'required|mimes:csv,txt|max:2048',

        ], [
            'doc.required' => 'É necessário escolher um arquivo para importar.',
            'doc.mimes' => 'Arquivo inválido. Necessário enviar um arquivo .csv.',
            'doc.max' => 'Tamanho do arquivo excede o :max MB',
        ]);

        // criar array com colunas do banco de dados
        $headers = ['user_id', 'cpf'];

        // receber os dados do arquivo
        $dataFile = array_map('str_getcsv', file($request->file('doc')));

        //emails já registrados
        $cpfAlredyRegistered = false;

        // percorrer as linhas do array
        foreach ($dataFile as $keyData => $row) {
            // converter a linha em array
            $values = explode(';', $row[0]);

            // percorrer as colunas do cabeçalho
            foreach ($headers as $key => $header) {

                // verificar e-mail
                if ($header == 'cpf') {
                    // verificar se já cadastrado
                    if (PersonalDocument::where('cpf', $values[$key])->first()) {
                        // listar já cadastrados
                        $cpfAlredyRegistered .= $values[$key] . ",";
                    }
                }
                // atribuir os valores
                $arrayValues[$keyData][$header] = $values[$key];
            }
        }

        // Caso e-mail já tenha sido cadastrado, retornar com mensagem e não salvar no banco de dados
        if ($cpfAlredyRegistered) {
            return back()->with('error', 'Dados não importados. CPF já cadastrado: ' . $cpfAlredyRegistered);
        }
        // dd($arrayValues);
        // cadastrar os registros no banco de dados
        PersonalDocument::insert($arrayValues);
        //Retornar para a view
        return view('users.index', ['users' => $users]);
    }

    public function importbancdata(Request $request)
    {
        //recuperar os dados do BD
        $users = User::orderBy('name')->get();

        // validar o arquivo
        $request->validate([
            'banc' => 'required|mimes:csv,txt|max:2048',

        ], [
            'banc.required' => 'É necessário escolher um arquivo para importar.',
            'banc.mimes' => 'Arquivo inválido. Necessário enviar um arquivo .csv.',
            'banc.max' => 'Tamanho do arquivo excede o :max MB',
        ]);

        // criar array com colunas do banco de dados
        $headers = ['user_id', 'banco', 'agencia', 'tipo_conta', 'numero_conta', 'tipo_pix', 'pix'];

        // receber os dados do arquivo
        $dataFile = array_map('str_getcsv', file($request->file('banc')));

        //emails já registrados
        $pixAlredyRegistered = false;

        // percorrer as linhas do array
        foreach ($dataFile as $keyData => $row) {
            // converter a linha em array
            $values = explode(';', $row[0]);

            // percorrer as colunas do cabeçalho
            foreach ($headers as $key => $header) {

                // verificar e-mail
                if ($header == 'user_id') {
                    // verificar se já cadastrado
                    if (BancAcount::where('user_id', $values[$key])->first()) {
                        // listar já cadastrados
                        $pixAlredyRegistered .= $values[$key] . ",";
                    }
                }
                // atribuir os valores
                $arrayValues[$keyData][$header] = $values[$key];
            }
        }

        // Caso e-mail já tenha sido cadastrado, retornar com mensagem e não salvar no banco de dados
        if ($pixAlredyRegistered) {
            return back()->with('error', 'Dados não importados.');
        }
        // dd($arrayValues);
        // cadastrar os registros no banco de dados
        BancAcount::insert($arrayValues);
        //Retornar para a view
        return view('users.index', ['users' => $users]);
    }

    public function importadressdata(Request $request)
    {
        //recuperar os dados do BD
        $users = User::orderBy('name')->get();

        // validar o arquivo
        $request->validate([
            'adress' => 'required|mimes:csv,txt|max:2048',

        ], [
            'adress.required' => 'É necessário escolher um arquivo para importar.',
            'adress.mimes' => 'Arquivo inválido. Necessário enviar um arquivo .csv.',
            'adress.max' => 'Tamanho do arquivo excede o :max MB',
        ]);

        // criar array com colunas do banco de dados
        $headers = ['user_id', 'endereco'];

        // receber os dados do arquivo
        $dataFile = array_map('str_getcsv', file($request->file('adress')));

        //emails já registrados
        $telefoneAlredyRegistered = false;

        // percorrer as linhas do array
        foreach ($dataFile as $keyData => $row) {
            // converter a linha em array
            $values = explode(';', $row[0]);

            // percorrer as colunas do cabeçalho
            foreach ($headers as $key => $header) {

                // verificar e-mail
                if ($header == 'telefone') {
                    // verificar se já cadastrado
                    if (BancAcount::where('telefone', $values[$key])->first()) {
                        // listar já cadastrados
                        $telefoneAlredyRegistered .= $values[$key] . ",";
                    }
                }
                // atribuir os valores
                $arrayValues[$keyData][$header] = $values[$key];
            }
        }

        // Caso e-mail já tenha sido cadastrado, retornar com mensagem e não salvar no banco de dados
        if ($telefoneAlredyRegistered) {
            return back()->with('error', 'Dados não importados. Telefone já cadastrado: ' . $telefoneAlredyRegistered);
        }
        // dd($arrayValues);
        // cadastrar os registros no banco de dados
        Adress::insert($arrayValues);
        //Retornar para a view
        return view('users.index', ['users' => $users]);
    }

    public function importcontratosdata(Request $request)
    {
        //recuperar os dados do BD
        $users = User::orderBy('name')->get();

        // validar o arquivo
        $request->validate([
            'contrato' => 'required|mimes:csv,txt|max:2048',

        ], [
            'contrato.required' => 'É necessário escolher um arquivo para importar.',
            'contrato.mimes' => 'Arquivo inválido. Necessário enviar um arquivo .csv.',
            'contrato.max' => 'Tamanho do arquivo excede o :max MB',
        ]);

        // criar array com colunas do banco de dados
        $headers = ['user_id', 'tipoContrato'];

        // receber os dados do arquivo
        $dataFile = array_map('str_getcsv', file($request->file('contrato')));


        // percorrer as linhas do array
        foreach ($dataFile as $keyData => $row) {
            // converter a linha em array
            $values = explode(';', $row[0]);

            // percorrer as colunas do cabeçalho
            foreach ($headers as $key => $header) {

                // atribuir os valores
                $arrayValues[$keyData][$header] = $values[$key];
            }
        }
        // dd($arrayValues);
        // cadastrar os registros no banco de dados
        Contrato::insert($arrayValues);
        //Retornar para a view
        return view('users.index', ['users' => $users])->with('success', 'Dados de contratos importados com sucesso');
    }

    public function importesocialdata(Request $request)
    {
        //recuperar os dados do BD
        $users = User::orderBy('name')->get();

        // validar o arquivo
        $request->validate([
            'esocial' => 'required|mimes:csv,txt|max:2048',

        ], [
            'esocial.required' => 'É necessário escolher um arquivo para importar.',
            'esocial.mimes' => 'Arquivo inválido. Necessário enviar um arquivo .csv.',
            'esocial.max' => 'Tamanho do arquivo excede o :max MB',
        ]);

        // criar array com colunas do banco de dados
        $headers = ['user_id', 'matricula', 'nocivos', 'admissionais', 'periodicos', 'mudanca', 'retorno', 'demissional'];

        // receber os dados do arquivo
        $dataFile = array_map('str_getcsv', file($request->file('esocial')));


        // percorrer as linhas do array
        foreach ($dataFile as $keyData => $row) {
            // converter a linha em array
            $values = explode(';', $row[0]);

            // percorrer as colunas do cabeçalho
            foreach ($headers as $key => $header) {

                // atribuir os valores
                $arrayValues[$keyData][$header] = $values[$key];
            }
        }
        // dd($arrayValues);
        // cadastrar os registros no banco de dados
        ESocial::insert($arrayValues);
        //Retornar para a view
        return view('users.index', ['users' => $users])->with('success', 'Dados de contratos importados com sucesso');
    }

    public function showDocument(User $user)
    {
        // Recuperar informações do banco de dados
        $docs = $user->documentos()->first();
        $adress = $user->adress()->first();
        $banco = $user->bancario()->first();
        $contrato = $user->contrato()->first();
        $esocial = $user->esocial()->first();
        $roles = $user->role()->first();

        // Retornar para a view com os dados
        return view('users.document', [
            'user' => $user,
            'docs' => $docs,
            'adress' => $adress,
            'banco' => $banco,
            'contrato' => $contrato,
            'esocial' => $esocial,
            'roles' => $roles,
        ]);
    }

    public function generatePdf(User $user)
    {
        // Recuperar informações do banco de dados
        $docs = $user->documentos()->first();
        $adress = $user->adress()->first();
        $banco = $user->bancario()->first();
        $contrato = $user->contrato()->first();
        $esocial = $user->esocial()->first();
        $roles = $user->role()->first();

        // Gerar PDF com os dados
        $pdf = Pdf::loadView('users.document', [
            'user' => $user,
            'docs' => $docs,
            'adress' => $adress,
            'banco' => $banco,
            'contrato' => $contrato,
            'esocial' => $esocial,
            'roles' => $roles,
        ]);

        // Retornar o PDF para download
        return $pdf->download('documento_usuario_' . $user->id . '.pdf');
    }
}
