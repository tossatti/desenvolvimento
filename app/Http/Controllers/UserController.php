<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\{Adress, BancAcount, Contrato, Dependente, ESocial, Hire, PersonalDocument, Role, Signature, User};
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {

        $perPage = 30;
        $users = User::with('contrato.hire')
            ->orderBy('name')
            ->paginate($perPage);

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
        $dependentes = $user->dependentes();
        //retornar para a view
        return view('users.show', [
            'user' => $user,
            'docs' => $docs,
            'adress' => $adress,
            'banco' => $banco,
            'contrato' => $contrato,
            'esocial' => $esocial,
            'roles' => $roles,
            'dependentes' => $dependentes,
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
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'nullable|min:6',
            'nascimento' => 'nullable|date',
            'naturalidade' => 'nullable|max:255',
            'nacionalidade' => 'nullable|max:255',
            'genero' => 'nullable|max:20',
            'escolaridade' => 'nullable|max:100',
            'raca' => 'nullable|max:50',
            'civil' => 'nullable|max:50',
            'calca' => 'nullable|max:10',
            'camisa' => 'nullable|max:10',
            'calcado' => 'nullable|max:10',
            'nr10' => 'nullable|boolean',
            'dependentes' => 'nullable|boolean',
            'numeroDependentes' => 'nullable|integer|min:0',
            'cpf' => 'required|size:14|unique:personal_documents,cpf',
            'pis' => 'nullable|max:20|unique:personal_documents,pis_pasep',
            'titulo' => 'nullable|max:20|unique:personal_documents,titulo_eleitor',
            'zona' => 'nullable|integer|min:1',
            'secao' => 'nullable|integer|min:1',
            'cnh' => 'nullable|max:20|unique:personal_documents,cnh',
            'catchn' => 'nullable|max:10',
            'ctps' => 'nullable|max:20|unique:personal_documents,ctps',
            'banco' => 'nullable|max:100',
            'agencia' => 'nullable|max:20',
            'tipo_conta' => 'nullable|max:50',
            'numero_conta' => 'nullable|max:50',
            'tipo_pix' => 'nullable|max:50',
            'pix' => 'nullable|max:255',
            'endereco' => 'nullable|max:255',
            'numero' => 'nullable|max:20',
            'complemento' => 'nullable|max:255',
            'bairro' => 'nullable|max:255',
            'cidade' => 'nullable|max:255',
            'estado' => 'nullable|size:2',
            'cep' => 'nullable|size:9',
            'telefone' => 'nullable|max:20',
            'remuneration_id' => 'nullable|exists:remunerations,id',
            'role_id' => 'nullable|exists:roles,id',
            'tipoContrato' => 'nullable|max:50',
            'lotacao' => 'nullable|max:255',
            'equipe' => 'nullable|max:255',
            'cbo' => 'nullable|max:10',
            'situacao' => 'nullable|max:50',
            'disponibilidade' => 'nullable|max:50',
            'aso' => 'nullable|date',
            'admissao' => 'nullable|date',
            'termino' => 'nullable|date|nullable',
            'observacao' => 'nullable',
            'matricula' => 'nullable|max:50|unique:e_socials,matricula',
            'nocivos' => 'nullable|boolean',
            'admissionais' => 'nullable|boolean',
            'periodicos' => 'nullable|boolean',
            'mudanca' => 'nullable|boolean',
            'retorno' => 'nullable|boolean',
            'demissional' => 'nullable|boolean',
        ], [
            'name.required' => 'O campo Nome é obrigatório.',
            'name.max' => 'O campo Nome não pode ter mais de 255 caracteres.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'O campo E-mail deve ser um endereço de e-mail válido.',
            'email.max' => 'O campo E-mail não pode ter mais de 255 caracteres.',
            'email.unique' => 'Este E-mail já está cadastrado.',
            'password.min' => 'O campo Senha deve ter pelo menos :min. dígitos',
            'nascimento.date' => 'O campo Data de Nascimento deve ser uma data válida.',
            'naturalidade.max' => 'O campo Naturalidade não pode ter mais de 255 caracteres.',
            'nacionalidade.max' => 'O campo Nacionalidade não pode ter mais de 255 caracteres.',
            'genero.max' => 'O campo Gênero não pode ter mais de 20 caracteres.',
            'escolaridade.max' => 'O campo Escolaridade não pode ter mais de 100 caracteres.',
            'raca.max' => 'O campo Raça não pode ter mais de 50 caracteres.',
            'civil.max' => 'O campo Estado Civil não pode ter mais de 50 caracteres.',
            'calca.max' => 'O campo Tamanho da Calça não pode ter mais de 10 caracteres.',
            'camisa.max' => 'O campo Tamanho da Camisa não pode ter mais de 10 caracteres.',
            'calcado.max' => 'O campo Tamanho do Calçado não pode ter mais de 10 caracteres.',
            'nr10.boolean' => 'O campo NR10 deve ser verdadeiro ou falso.',
            'dependentes.boolean' => 'O campo Dependentes deve ser verdadeiro ou falso.',
            'numeroDependentes.integer' => 'O campo Número de Dependentes deve ser um número inteiro.',
            'numeroDependentes.min' => 'O campo Número de Dependentes não pode ser negativo.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.size' => 'O campo CPF deve ter 14 caracteres.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'pis.max' => 'O campo PIS/PASEP não pode ter mais de 20 caracteres.',
            'pis.unique' => 'Este PIS/PASEP já está cadastrado.',
            'titulo.max' => 'O campo Título de Eleitor não pode ter mais de 20 caracteres.',
            'titulo.unique' => 'Este Título de Eleitor já está cadastrado.',
            'zona.integer' => 'O campo Zona Eleitoral deve ser um número inteiro.',
            'zona.min' => 'O campo Zona Eleitoral deve ser no mínimo 1.',
            'secao.integer' => 'O campo Seção Eleitoral deve ser um número inteiro.',
            'secao.min' => 'O campo Seção Eleitoral deve ser no mínimo 1.',
            'cnh.max' => 'O campo CNH não pode ter mais de 20 caracteres.',
            'cnh.unique' => 'Esta CNH já está cadastrada.',
            'catchn.max' => 'O campo Categoria da CNH não pode ter mais de 10 caracteres.',
            'ctps.max' => 'O campo CTPS não pode ter mais de 20 caracteres.',
            'ctps.unique' => 'Esta CTPS já está cadastrada.',
            'banco.max' => 'O campo Banco não pode ter mais de 100 caracteres.',
            'agencia.max' => 'O campo Agência não pode ter mais de 20 caracteres.',
            'tipo_conta.max' => 'O campo Tipo de Conta não pode ter mais de 50 caracteres.',
            'numero_conta.max' => 'O campo Número da Conta não pode ter mais de 50 caracteres.',
            'tipo_pix.max' => 'O campo Tipo de PIX não pode ter mais de 50 caracteres.',
            'pix.max' => 'O campo Chave PIX não pode ter mais de 255 caracteres.',
            'endereco.max' => 'O campo Endereço não pode ter mais de 255 caracteres.',
            'numero.max' => 'O campo Número não pode ter mais de 20 caracteres.',
            'complemento.max' => 'O campo Complemento não pode ter mais de 255 caracteres.',
            'bairro.max' => 'O campo Bairro não pode ter mais de 255 caracteres.',
            'cidade.max' => 'O campo Cidade não pode ter mais de 255 caracteres.',
            'estado.size' => 'O campo Estado deve ter 2 caracteres.',
            'cep.size' => 'O campo CEP deve ter 9 caracteres.',
            'telefone.max' => 'O campo Telefone não pode ter mais de 20 caracteres.',
            'remuneration_id.exists' => 'A Remuneração selecionada é inválida.',
            'role_id.exists' => 'O Cargo selecionado é inválido.',
            'tipoContrato.max' => 'O campo Tipo de Contrato não pode ter mais de 50 caracteres.',
            'lotacao.max' => 'O campo Lotação não pode ter mais de 255 caracteres.',
            'equipe.max' => 'O campo Equipe não pode ter mais de 255 caracteres.',
            'cbo.max' => 'O campo CBO não pode ter mais de 10 caracteres.',
            'situacao.max' => 'O campo Situação não pode ter mais de 50 caracteres.',
            'disponibilidade.max' => 'O campo Disponibilidade não pode ter mais de 50 caracteres.',
            'aso.date' => 'O campo ASO deve ser uma data válida.',
            'admissao.date' => 'O campo Admissão deve ser uma data válida.',
            'termino.date' => 'O campo Término deve ser uma data válida.',
            'matricula.max' => 'O campo Matrícula (E-social) não pode ter mais de 50 caracteres.',
            'matricula.unique' => 'Esta Matrícula (E-social) já está cadastrada.',
            'nocivos.boolean' => 'O campo Agentes Nocivos (E-social) deve ser verdadeiro ou falso.',
            'admissionais.boolean' => 'O campo Admissionais (E-social) deve ser verdadeiro ou falso.',
            'periodicos.boolean' => 'O campo Periódicos (E-social) deve ser verdadeiro ou falso.',
            'mudanca.boolean' => 'O campo Mudança de Função (E-social) deve ser verdadeiro ou falso.',
            'retorno.boolean' => 'O campo Retorno ao Trabalho (E-social) deve ser verdadeiro ou falso.',
            'demissional.boolean' => 'O campo Demissional (E-social) deve ser verdadeiro ou falso.',
        ]);
        
        // DB::listen(function ($query) {
        //     Log::info("SQL: " . $query->sql);
        //     Log::info("Bindings: " . print_r($query->bindings, true));
        //     Log::info("Time: " . $query->time);
        // });

        DB::beginTransaction(); // Inicia a transação

        try {
            // Cadastrar usuário
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password), // É importante hashear a senha antes de salvar
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

            // Documentos pessoais
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

            // Dados bancários
            BancAcount::create([
                'user_id' => $user->id,
                'banco' => $request->banco,
                'agencia' => $request->agencia,
                'tipo_conta' => $request->tipo_conta,
                'numero_conta' => $request->numero_conta, // Corrigi o espaço extra no nome da coluna
                'tipo_pix' => $request->tipo_pix,
                'pix' => $request->pix,
            ]);

            // Endereço
            Adress::create([
                'user_id' => $user->id,
                'endereco' => $request->endereco,
                'numero' => $request->numero,
                'complemento' => $request->complemento,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'estado' => $request->estado,
                'cep' => preg_replace('/[^0-9]/', '', $request->cep),
                'telefone' => preg_replace('/[^0-9]/', '', $request->telefone),
            ]);

            // Contrato
            Contrato::create([
                'user_id' => $user->id,
                'remuneration_id' => $request->remuneration_id,
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

            // E-social
            ESocial::create([
                'user_id' => $user->id,
                'matricula' => $request->matricula,
                'nocivos' => $request->nocivos,
                'admissionais' => $request->admissionais,
                'periodicos' => $request->periodicos,
                'mudanca' => $request->mudanca,
                'retorno' => $request->retorno,
                'demissional' => $request->demissional,

            ]);

            DB::commit(); // Se todas as operações foram bem-sucedidas, confirma a transação

            // Redirecionar para a view
            return redirect()->route('users.index')->with('success', 'Colaborador cadastrado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback(); // Se ocorrer alguma exceção, desfaz todas as operações da transação
            // Log do erro para análise (opcional)
            Log::error('Erro ao cadastrar colaborador: ' . $e->getMessage());
            // Redirecionar de volta com uma mensagem de erro
            return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o colaborador. Por favor, tente novamente.');
        }
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

    public function update(UserRequest $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'nullable|min:6',
            'nascimento' => 'nullable|date',
            'naturalidade' => 'nullable|max:255',
            'nacionalidade' => 'nullable|max:255',
            'genero' => 'nullable|max:20',
            'escolaridade' => 'nullable|max:100',
            'raca' => 'nullable|max:50',
            'civil' => 'nullable|max:50',
            'calca' => 'nullable|max:10',
            'camisa' => 'nullable|max:10',
            'calcado' => 'nullable|max:10',
            'nr10' => 'nullable|boolean',
            'dependentes' => 'nullable|boolean',
            'numeroDependentes' => 'nullable|integer|min:0',
            'cpf' => 'required|size:14|unique:personal_documents,cpf',
            'pis' => 'nullable|max:20|unique:personal_documents,pis_pasep',
            'titulo' => 'nullable|max:20|unique:personal_documents,titulo_eleitor',
            'zona' => 'nullable|integer|min:1',
            'secao' => 'nullable|integer|min:1',
            'cnh' => 'nullable|max:20|unique:personal_documents,cnh',
            'catchn' => 'nullable|max:10',
            'ctps' => 'nullable|max:20|unique:personal_documents,ctps',
            'banco' => 'nullable|max:100',
            'agencia' => 'nullable|max:20',
            'tipo_conta' => 'nullable|max:50',
            'numero_conta' => 'nullable|max:50',
            'tipo_pix' => 'nullable|max:50',
            'pix' => 'nullable|max:255',
            'endereco' => 'nullable|max:255',
            'numero' => 'nullable|max:20',
            'complemento' => 'nullable|max:255',
            'bairro' => 'nullable|max:255',
            'cidade' => 'nullable|max:255',
            'estado' => 'nullable|size:2',
            'cep' => 'nullable|size:9',
            'telefone' => 'nullable|max:20',
            'remuneration_id' => 'nullable|exists:remunerations,id',
            'role_id' => 'nullable|exists:roles,id',
            'tipoContrato' => 'nullable|max:50',
            'lotacao' => 'nullable|max:255',
            'equipe' => 'nullable|max:255',
            'cbo' => 'nullable|max:10',
            'situacao' => 'nullable|max:50',
            'disponibilidade' => 'nullable|max:50',
            'aso' => 'nullable|date',
            'admissao' => 'nullable|date',
            'termino' => 'nullable|date|nullable',
            'observacao' => 'nullable',
            'matricula' => 'nullable|max:50|unique:e_socials,matricula',
            'nocivos' => 'nullable|boolean',
            'admissionais' => 'nullable|boolean',
            'periodicos' => 'nullable|boolean',
            'mudanca' => 'nullable|boolean',
            'retorno' => 'nullable|boolean',
            'demissional' => 'nullable|boolean',
        ], [
            'name.required' => 'O campo Nome é obrigatório.',
            'name.max' => 'O campo Nome não pode ter mais de 255 caracteres.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'O campo E-mail deve ser um endereço de e-mail válido.',
            'email.max' => 'O campo E-mail não pode ter mais de 255 caracteres.',
            'email.unique' => 'Este E-mail já está cadastrado.',
            'password.min' => 'O campo Senha deve ter pelo menos :min. dígitos',
            'nascimento.date' => 'O campo Data de Nascimento deve ser uma data válida.',
            'naturalidade.max' => 'O campo Naturalidade não pode ter mais de 255 caracteres.',
            'nacionalidade.max' => 'O campo Nacionalidade não pode ter mais de 255 caracteres.',
            'genero.max' => 'O campo Gênero não pode ter mais de 20 caracteres.',
            'escolaridade.max' => 'O campo Escolaridade não pode ter mais de 100 caracteres.',
            'raca.max' => 'O campo Raça não pode ter mais de 50 caracteres.',
            'civil.max' => 'O campo Estado Civil não pode ter mais de 50 caracteres.',
            'calca.max' => 'O campo Tamanho da Calça não pode ter mais de 10 caracteres.',
            'camisa.max' => 'O campo Tamanho da Camisa não pode ter mais de 10 caracteres.',
            'calcado.max' => 'O campo Tamanho do Calçado não pode ter mais de 10 caracteres.',
            'nr10.boolean' => 'O campo NR10 deve ser verdadeiro ou falso.',
            'dependentes.boolean' => 'O campo Dependentes deve ser verdadeiro ou falso.',
            'numeroDependentes.integer' => 'O campo Número de Dependentes deve ser um número inteiro.',
            'numeroDependentes.min' => 'O campo Número de Dependentes não pode ser negativo.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.size' => 'O campo CPF deve ter 14 caracteres.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'pis.max' => 'O campo PIS/PASEP não pode ter mais de 20 caracteres.',
            'pis.unique' => 'Este PIS/PASEP já está cadastrado.',
            'titulo.max' => 'O campo Título de Eleitor não pode ter mais de 20 caracteres.',
            'titulo.unique' => 'Este Título de Eleitor já está cadastrado.',
            'zona.integer' => 'O campo Zona Eleitoral deve ser um número inteiro.',
            'zona.min' => 'O campo Zona Eleitoral deve ser no mínimo 1.',
            'secao.integer' => 'O campo Seção Eleitoral deve ser um número inteiro.',
            'secao.min' => 'O campo Seção Eleitoral deve ser no mínimo 1.',
            'cnh.max' => 'O campo CNH não pode ter mais de 20 caracteres.',
            'cnh.unique' => 'Esta CNH já está cadastrada.',
            'catchn.max' => 'O campo Categoria da CNH não pode ter mais de 10 caracteres.',
            'ctps.max' => 'O campo CTPS não pode ter mais de 20 caracteres.',
            'ctps.unique' => 'Esta CTPS já está cadastrada.',
            'banco.max' => 'O campo Banco não pode ter mais de 100 caracteres.',
            'agencia.max' => 'O campo Agência não pode ter mais de 20 caracteres.',
            'tipo_conta.max' => 'O campo Tipo de Conta não pode ter mais de 50 caracteres.',
            'numero_conta.max' => 'O campo Número da Conta não pode ter mais de 50 caracteres.',
            'tipo_pix.max' => 'O campo Tipo de PIX não pode ter mais de 50 caracteres.',
            'pix.max' => 'O campo Chave PIX não pode ter mais de 255 caracteres.',
            'endereco.max' => 'O campo Endereço não pode ter mais de 255 caracteres.',
            'numero.max' => 'O campo Número não pode ter mais de 20 caracteres.',
            'complemento.max' => 'O campo Complemento não pode ter mais de 255 caracteres.',
            'bairro.max' => 'O campo Bairro não pode ter mais de 255 caracteres.',
            'cidade.max' => 'O campo Cidade não pode ter mais de 255 caracteres.',
            'estado.size' => 'O campo Estado deve ter 2 caracteres.',
            'cep.size' => 'O campo CEP deve ter 9 caracteres.',
            'telefone.max' => 'O campo Telefone não pode ter mais de 20 caracteres.',
            'remuneration_id.exists' => 'A Remuneração selecionada é inválida.',
            'role_id.exists' => 'O Cargo selecionado é inválido.',
            'tipoContrato.max' => 'O campo Tipo de Contrato não pode ter mais de 50 caracteres.',
            'lotacao.max' => 'O campo Lotação não pode ter mais de 255 caracteres.',
            'equipe.max' => 'O campo Equipe não pode ter mais de 255 caracteres.',
            'cbo.max' => 'O campo CBO não pode ter mais de 10 caracteres.',
            'situacao.max' => 'O campo Situação não pode ter mais de 50 caracteres.',
            'disponibilidade.max' => 'O campo Disponibilidade não pode ter mais de 50 caracteres.',
            'aso.date' => 'O campo ASO deve ser uma data válida.',
            'admissao.date' => 'O campo Admissão deve ser uma data válida.',
            'termino.date' => 'O campo Término deve ser uma data válida.',
            'matricula.max' => 'O campo Matrícula (E-social) não pode ter mais de 50 caracteres.',
            'matricula.unique' => 'Esta Matrícula (E-social) já está cadastrada.',
            'nocivos.boolean' => 'O campo Agentes Nocivos (E-social) deve ser verdadeiro ou falso.',
            'admissionais.boolean' => 'O campo Admissionais (E-social) deve ser verdadeiro ou falso.',
            'periodicos.boolean' => 'O campo Periódicos (E-social) deve ser verdadeiro ou falso.',
            'mudanca.boolean' => 'O campo Mudança de Função (E-social) deve ser verdadeiro ou falso.',
            'retorno.boolean' => 'O campo Retorno ao Trabalho (E-social) deve ser verdadeiro ou falso.',
            'demissional.boolean' => 'O campo Demissional (E-social) deve ser verdadeiro ou falso.',
        ]);

        DB::beginTransaction();

        try {
            // Atualizar dados do usuário
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? bcrypt($request->password) : $user->password,
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
                'temdependentes' => $request->tem_dependentes,
                'numeroDependentes' => $request->numeroDependentes,
            ]);

            // Atualizar documentos pessoais
            $user->documentos()->update([
                'cpf' => preg_replace('/[^0-9]/', '', $request->cpf),
                'pis_pasep' => preg_replace('/[^0-9]/', '', $request->pis),
                'titulo_eleitor' => preg_replace('/[^0-9]/', '', $request->titulo),
                'zona' => $request->zona,
                'secao' => $request->secao,
                'cnh' => preg_replace('/[^0-9]/', '', $request->cnh),
                'catcnh' => $request->catchn,
                'ctps' => preg_replace('/[^0-9]/', '', $request->ctps),
            ]);

            // Atualizar dados bancários
            $user->bancario()->update([
                'banco' => $request->banco,
                'agencia' => $request->agencia,
                'tipo_conta' => $request->tipo_conta,
                'numero_conta' => $request->numero_conta,
                'tipo_pix' => $request->tipo_pix,
                'pix' => $request->pix,
            ]);

            // Atualizar endereço
            $user->adress()->update([
                'endereco' => $request->endereco,
                'numero' => $request->numero,
                'complemento' => $request->complemento,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'estado' => $request->estado,
                'cep' => preg_replace('/[^0-9]/', '', $request->cep),
                'telefone' => preg_replace('/[^0-9]/', '', $request->telefone),
            ]);

            // Atualizar contrato
            $user->contrato()->update([
                'remuneration_id' => $request->remuneration_id,
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

            // Atualizar E-social
            $user->esocial()->update([
                'matricula' => $request->matricula,
                'nocivos' => $request->nocivos,
                'admissionais' => $request->admissionais,
                'periodicos' => $request->periodicos,
                'mudanca' => $request->mudanca,
                'retorno' => $request->retorno,
                'demissional' => $request->demissional,
            ]);

            // Atualizar dependentes existentes
            if ($request->has('dependentes')) {
                foreach ($request->input('dependentes') as $dependenteId => $dependenteData) {
                    $dependente = $user->dependentes()->find($dependenteId);
                    if ($dependente) {
                        $dependenteData['cpf'] = preg_replace('/[^0-9]/', '', $dependenteData['cpf'] ?? '');
                        $dependente->update($dependenteData);
                    }
                }
            }

            // Criar novos dependentes
            if ($request->has('novos_dependentes')) {
                foreach ($request->input('novos_dependentes') as $dependenteData) {
                    if (isset($dependenteData['name']) || isset($dependenteData['nascimento']) || isset($dependenteData['cpf'])) {
                        $dependenteData['cpf'] = preg_replace('/[^0-9]/', '', $dependenteData['cpf'] ?? '');
                        $user->dependentes()->create($dependenteData);
                    }
                }
            }

            // Remover dependentes
            if ($request->has('remover_dependentes')) {
                Dependente::whereIn('id', $request->input('remover_dependentes'))->delete();
            }

            DB::commit();

            return redirect()->route('users.index')->with('success', 'Colaborador atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Erro ao atualizar colaborador: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar o colaborador. Por favor, tente novamente.');
        }
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
        $signatureTrabalhador = Signature::where('user_id', $user->id)
            ->latest('data_assinatura')
            ->first();

        $signatureEmpregador = Signature::where('user_id', $user->id)
            ->latest('data_assinatura')
            ->first();

        // Retornar para a view com os dados
        return view('users.document', [
            'user' => $user,
            'docs' => $docs,
            'adress' => $adress,
            'banco' => $banco,
            'contrato' => $contrato,
            'esocial' => $esocial,
            'roles' => $roles,
            'signatureTrabalhador' => $signatureTrabalhador,
            'signatureEmpregador' => $signatureEmpregador,
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
