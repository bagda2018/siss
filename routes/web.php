<?php







Route::resource('/site', 'site\SiteController');
Route::resource('/provincia', 'painel\ProvinciaController');
Route::resource('/municipio', 'painel\MunicipioController');
Route::resource('/entidade_financeira', 'painel\EntidadeFinanceiraController');
Route::resource('/especialidade', 'painel\EspecialidadeController');
Route::resource('/servico', 'painel\ServicoController');
Route::resource('tipo_exame', 'painel\TipoExameController');
Route::resource('/utente', 'painel\UtenteController');
Route::resource('/medico', 'painel\PessoalClinicoController');
Route::resource('/agenda_trabalho', 'painel\AgendaTrabalhoController');
Route::resource('/rcu', 'painel\RcuController');
Route::resource('/exame', 'painel\ExameController');
Route::resource('/consulta', 'painel\ConsultaController');
Route::resource('/diagnostico', 'painel\DiagnosticoController');
Route::resource('/administrador', 'painel\PessoalAdministrativoController');
Route::resource('/categoria_clinica', 'painel\CategoriaClinicaController');

Route::any('categoria_clinica/teste', 'painel\CategoriaClinicaController@teste')->name('teste');



Route::any('especialidade-search', 'painel\EspecialidadeController@search')->name('buscarEsp');
Route::any('exame-search', 'painel\TipoExameController@search')->name('buscarExames');

//Route::any('utente-consultas/{id}', 'painel\UtenteController@consultas')->name('utente_consultas');
Route::any('utente_consultas/{estado}/{id}', 'painel\UtenteController@consultas')->name('utente_consultas');
Route::any('utente-exames/{id}', 'painel\UtenteController@exames')->name('utente_exames');
Route::any('buscar_consultas/{estado}/{id}', 'painel\PessoalClinicoController@buscarConsultas')->name('buscar_consultas');
Route::any('realizar_consulta/{id}', 'painel\consultaController@realizar')->name('realizar');

Route::get('/select-dinamico', 'DynamicDependentController@index');
Route::get('/painel/utente/efectuaConsulta', 'painel\UtenteController@getMarcarConsultaUtente');
Route::match(['get','post'],'/painel/utente/postEfectuaConsulta', 'painel\UtenteController@postMarcarConsultaUtente');

//Route::post('/painel/teste', 'painel\UtenteController@teste');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
//Route::get('/logout', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
