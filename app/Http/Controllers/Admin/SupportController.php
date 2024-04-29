<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\In;
use App\Http\Requests\StoreUpdateSupport;


class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports=$support->all();
       
        return view('admin.index', compact('supports')); //manda os dados para view , para ser exibido
    }


    public function create()
    {
        return view('admin.create');
    }
  public function store(StoreUpdateSupport $request , Support $support)
    {

        //a validação foi passada para a pasta Request

        //passei para o banco de dados a requisição  
        $data = $request->validated();
        $data['status']='a';


       $support->create($data);
       
       return Redirect()->route('supports.index');
       
    }


    public function show(string|int $id )
    {
         $support = Support::find($id);
         return view('admin.show', compact('support'));
    }


    //mais um exemplo de como recuperar o usuario pelo id
    public function edit(Support $support, string|int $id)
    {
        if (!$support = $support->where('id', $id)->first()) {
            return back();
        }
    
        return view('admin.edit', compact('support'));
    }
    



     //importante verificar se o id existe , para saber onde mandar o usuario
     public function update(StoreUpdateSupport $request , Support $support, string $id){

       if(!$support = Support::find($id)){
            return back();
       }

       //realização do update
       $support->update($request->only(
        ['subject', 'body']
       ));

        return redirect()->route('supports.index');

     }



     public function destroy(string|int $id)
     {
        //realizando novamente a verificação para ver se existe o id
        if(!$support = Support::find($id)){
            return back();
       }

       $support->delete();

       return redirect()->route('supports.index');

     }

}