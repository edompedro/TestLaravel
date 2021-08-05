<?php

namespace App\Http\Controllers;

use App\Models\EmpregadoModel;
use Illuminate\Http\Request;
use Validator;

class HomeController extends Controller
{
    //
    public function index(){
        $empregadoModel = new EmpregadoModel();
        $data['empregadoList'] = $empregadoModel->all();
        return view ('pages.formview', $data);
    }

    public function register(){
        return view ('pages.formregister');
    }

    public function insert(Request $req){

        $validator=$this->setValidationFields($req);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $empregadoModel = new EmpregadoModel();

        $empregadoModel->nome = $req->nome;
        $empregadoModel->cargo = $req->cargo;
        $empregadoModel->endereco = $req->endereco;
        $empregadoModel->salario = $req->salario;

        $empregadoModel->save();

        return redirect('/')->with('success','Empregado adicionado com sucesso ao banco de dados');
    }

    public function delete($id){

        $empregadoModel = new EmpregadoModel();

        $empregadoModel->find($id)->delete();

        return redirect('/')->with('success', 'EMpregado deletado com sucesso!');
    }

    public function setValidationFields(Request $req){

        $validator = Validator::make($req->all(), [
            'nome' => 'required',
            'cargo' => 'required|min:1|max:3',
            'endereco' => 'required',
            'salario' => 'required'
        ]);
        return $validator;
    }

    public function update($id){

        $empregadoModel = new EmpregadoModel();

        $data = $empregadoModel->where('id',$id)->first();

        return view('pages.formedit', $data);    
    }

    public function updateperson(Request $req, $id){

        $validator=$this->setValidationFields($req);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $data = array(
            'nome' => $req->nome,
            'cargo' => $req->cargo,
            'endereco' => $req->endereco,
            'salario' => $req->salario
        );
        EmpregadoModel::find($id)->update($data);
        return redirect('/')->with('success', 'Empregado atualizado com sucesso!');
    }

    public function search(Request $req){
        $searchQuery = $req->SearchQuery;
        $maior = 0;
        if ($searchQuery == "salario" || $searchQuery == "Salario"){
            $data['empregadoList'] = EmpregadoModel::all();
            foreach ($data['empregadoList'] as $item){
                if ($item->salario > $maior){
                    $maior = $item->salario;
                }
            }
            return redirect('/')->with('success', 'O maior salário é: U$'.$maior);
        }else{
            $data['empregadoList'] = EmpregadoModel::where('cargo','like','%' . $searchQuery . '%')->get();
            $total = 0;
            if($searchQuery == 2){

                foreach ($data['empregadoList'] as $item){
                    $total = $total+1;
                };

                return redirect('/')->with('success', 'existem: '.$total.' gerentes');

            }elseif ($searchQuery ==1) {
                
                foreach ($data['empregadoList'] as $item){
                    $total = $total+1;
                }; 

                return redirect('/')->with('success', 'existem: '.$total.' diretores');

            }elseif ($searchQuery ==3) {
                
                foreach ($data['empregadoList'] as $item){
                    $total = $total+1;
                };

                return redirect('/')->with('success', 'existem: '.$total.' engenheiros');        
            }
        }
        
    }
}
