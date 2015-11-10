<?php

namespace app\controllers;
use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
use app\models\SageProduto;
use app\models\SageFornecedor;
use app\models\SageSubcategoria;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\helpers\Html;

class ConverterController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
			'access' => [
			            'class' => AccessControl::className(),
			            'rules' => [
			                [
			                    'allow' => true,
			                    'roles' => ['@'],
			                ],

			            ],
			        ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                   'index' => ['get','post'],'teste'=>['get','post'],
                ],
            ],
        ];
    }
	
	public function actionIndex()
	{
		 $model = new UploadForm();

		        if (Yii::$app->request->isPost) {
					
		            $model->file = UploadedFile::getInstance($model, 'file');
				    $ext=$model->file->extension;
					$file_name = $model->file->baseName . '.' . $model->file->extension;
					
					
		            if ($model->upload()) {
						if($ext == 'csv')
						{
		                $erros = $this->ConverterCSV($file_name);
					    }
						if($ext == 'txt')
						{
		                $erros = $this->ConverterTXT($file_name);
					    }
						if($erros == NULL){
							
							$link =Html::a('Ver em produtos', ['/produto'], ['class' => 'btn btn-primary']);
							 \Yii::$app->getSession()->setFlash('success', 'Dados importados! '.$link.'');
							 
						
						}else{
							if(is_array($erros))
							{
								$texto_erro="";
							foreach($erros as $erro)
							{
								$texto_erro.=$erro.'<br/>';
							}
								
								 \Yii::$app->getSession()->setFlash('error', $texto_erro);
						    }
						}
		               
		            }
		        }
		
		  
		  return $this->render('index',['model'=>$model]);
	}

	private function ConverterTXT($file)
	{
		$erros=NULL;
		$file_path = \Yii::getAlias('@upload').$file;
		$myfile = fopen($file_path, "r") or die("Unable to open file!");
		$linha=0;
	$cabecalho=[];
		$valor=[];
		$tmp=[];
		$produtos=[];
	
		    while($row = fgets($myfile)){
			if($linha == 0)
			{
				$_valuecabecalho=explode('|',$row);
				$cabecalho=['tipo'=>$_valuecabecalho[0],'quantidade'=>$_valuecabecalho[1]];
			}
			if($linha > 0)
			{
				$tmp[]=$row;
			}
			
			$linha++;
		   }//while
		fclose($myfile);	
		$quantidade=$cabecalho['quantidade'];
		if($linha > 0)
		{    $x=1;
			for($i=1;$i<=$quantidade;$i++)
			{   
				$vz=1;
				foreach($tmp as $tmps)
				{
					$_tmp=explode('|',$tmps);
					
						if($_tmp[0]!='A')
						{
					$valor[$i]['L'.$vz]=$tmps;
				         }
					
					
					
					if($vz > 1)
					{
						if($_tmp[0]=='A')
						{
						$i++;
						}
				    }
				    
					$vz++;
				}
			}
		}
			
			
		if(is_array($valor))
		{
			$i=1;
			foreach($valor as $valores)
			{
				foreach($valores as $dado)
				{
					$_decode=explode('|',$dado);
					foreach($_decode as $confere)
					{
						if(trim($confere) != "")
						{
						$produtos[$i][]=$confere;	
						}
					}
					
				
				}
				$i++;
			}
		    
		}
	
		if(is_array($produtos))
		{
			if(!empty($produtos))
			{
				foreach($produtos as $key)
				{
					
				
				    	
					$produto_model= new SageProduto();
					$sub_categoria=SageSubcategoria::find()
						->where(['nome'=>'Não informado'])
						->one();
					$fornecedor=SageFornecedor::find()
						->where(['nome'=>'Não informado'])
						->one();
					
					$produto_model->id_subcategoria1=$sub_categoria->id;
					$produto_model->id_subcategoria2=$sub_categoria->id;
					$produto_model->id_fornecedor=$fornecedor->id;
					
					if(isset($key[1]))
					{
					$produto_model->identificacao=$key[1];
				    }
					if(isset($key[2]))
					{
					$produto_model->descricao=$key[2];
				    }
					if(isset($key[3]))
					{
					$produto_model->codbarras=$key[3];
				    }
					if(isset($key[4]))
					{
					$produto_model->tipo=$key[4];
				    }
					if(isset($key[5]))
					{
					$produto_model->unidade=$key[5];
				    }
					if(isset($key[6]))
					{
					$produto_model->custo=$key[6];
				    }
					
					if(isset($key[8]))
					{
					$produto_model->estoque=$key[8];
					}
					
					    if($produto_model->validate())
						{
							
						$produto_model->save();
						}else{
						$erros=$produto_model->getErrors();
						}	
					
					
				}//fim loop
			}
		}
		return $erros;
	}
    private function ConverterCSV($file)
	{
   
		$erros=NULL;
		$file_path = \Yii::getAlias('@upload').$file;
	
		$file_handle = fopen($file_path, "r");

		$result = [];
        $out[]=[];
		if ($file_handle !== FALSE) {

		    $column_headers = fgetcsv($file_handle, '', ";");
			
			$count_sub=2;
		    foreach($column_headers as $setheader) {
				
				$setheader=$this->r_char(strtolower($setheader),TRUE);
			
						if(array_key_exists($setheader,$result))
						{

							 $result[$setheader.'_'.$count_sub] = array();
							 $count_sub++;
						}else{
						 $result[$setheader] = array();	
						}	
					
		    }  
			
			$_cabecalho=0;
			
			while ( ! feof($file_handle) )
			{
				$data = fgetcsv($file_handle, '', ";");
			
		
			    if( !empty($data) )
			       {
					$i=0;
	   		        foreach($result as $column=>$key) {
						
						
	   					$out[$_cabecalho][$column]=$data[$i];	
				   
					
	   				$i++;	
	   		        }
					
			       }
			   
				   $_cabecalho++;
			}
   		
		    fclose($file_handle);
		}

		
		if($out != NULL)
		{
			if(is_array($out))
			{
				
				foreach($out as $outs)
				{
					
					$produto_model= new SageProduto();
					
					
					$subcategoria = SageSubcategoria::find()
	   	             ->innerJoinWith('idCategoria', true)
	   	             ->where(['sage_categoria.nome' => $outs['categoria_2'],'sage_subcategoria.nome'=>$outs['categoria']])
					 ->one();
					 
					 if($subcategoria != NULL)
					 {
					 	$produto_model->id_subcategoria1=$subcategoria->id;
					 }else{
						 $subcategoria1_1= new SageSubcategoria();
						 $subcategoria1_2= new SageCategoria();
						 $subcategoria1_2->nome=$outs['categoria'];
						 if($subcategoria1_2->save())
						 {
						 	$subcategoria1_1->nome=$outs['categoria2'];
							$subcategoria1_1->id_categoria=$subcategoria1_2->primaryKey;
							if($subcategoria1_1->save())
							{
								$produto_model->id_subcategoria1=$subcategoria1_1->primaryKey;
							}
						 }
					 }
					
					 $produto_model->unidade=$outs['unidade'];
					 $produto_model->descricao=$outs['descricao'];
					 $produto_model->identificacao=$outs['identificacao'];
			 		 $custo= str_replace(".", "", $outs['custo']); 
			 		 $custo= str_replace(",", ".", $custo);
				     $produto_model->custo=$custo;
			 		 $preco1= str_replace(".", "", $outs['preco_de_venda_1']); 
			 		 $preco1= str_replace(",", ".", $preco1);
				     $produto_model->preco_venda1=$preco1;
				     $produto_model->observacoes=$outs['observacoes'];
					 
					 //fornecedor
					 if($outs['fornecedor'] == "" )
					 {
					  $produto_model->id_fornecedor=1;	
					 }else{
						 $fornecedor_model=SageFornecedor::find()->where(['nome'=>$outs['fornecedor']])->one();
						 if($fornecedor_model != NULL)
							 {
							 	$produto_model->id_fornecedor=$fornecedor_model->id;
							 }else{
								 $fornecedor_model = new SageForenecedor();
								 $fornecedor_model->nome=$outs['fornecedor'];
								 //$fornecedor_model->save(false);
								 //$id_fornecedor_model=$fornecedor_model->primaryKey; 
								 if($id_fornecedor_model)
								 {
								 	if($fornecedor_model->save())
									{
									$produto_model->id_fornecedor=$fornecedor_model->primaryKey;
								    }
								 }
								 
							 }
					 }
		
					 $produto_model->estoque=$outs['estoque'];
					 $produto_model->codbarras=$outs['cod._barra'];
			 		 $preco2= str_replace(".", "", $outs['preco_de_venda_2']); 
			 		 $preco2= str_replace(",", ".", $preco2);
					 $produto_model->preco_venda2=$preco2;
			 		 $preco3= str_replace(".", "", $outs['preco_de_venda_3']); 
			 		 $preco3= str_replace(",", ".", $preco3);
					 $produto_model->preco_venda3=$preco3;
					 $produto_model->estoque_minimo=$outs['estoque_minimo'];
		             $produto_model->estoque_maximo=$outs['estoque_maximo'];
					 $produto_model->estoque_compra=$outs['estoque_compra'];
					 $produto_model->fator_unidade_venda=$outs['fator_unid._de_venda'];
					 $produto_model->ncm=$outs['ncm'];
					 $produto_model->marca=$outs['marca'];
					 $produto_model->peso=$outs['peso'];
					 $produto_model->tamanho=$outs['tamanho'];
					 $produto_model->inativo=$outs['inativo'];
					 $produto_model->tipo=$outs['tipo'];
					 
 					$subcategoria2 = SageSubcategoria::find()
 	   	             ->innerJoinWith('idCategoria', true)
 	   	             ->where(['sage_categoria.nome' => $outs['categoria_3'],'sage_subcategoria.nome'=>$outs['categoria_4']])
 					 ->one();
					 
 					 if($subcategoria2 != NULL)
 					 {
 					 	$produto_model->id_subcategoria2=$subcategoria2->id;
 					 }else{
						 $subcategoria2_1= new SageSubcategoria();
						 $subcategoria2_2= new SageCategoria();
						 $subcategoria2_2->nome=$outs['categoria_3'];
						 if($subcategoria2_2->save())
						 {
						 	$subcategoria2_1->nome=$outs['categoria_4'];
							$subcategoria2_1->id_categoria=$subcategoria2_2->primaryKey;
							if($subcategoria2_1->save())
							{
								$produto_model->id_subcategoria2=$subcategoria2_1->primaryKey;
							}
						 }
 					 }
					 
					
					 $produto_model->composicao=$outs['composicao'];
					 $produto_model->materia_prima=$outs['materia_prima'];
					 $produto_model->paravenda=$outs['para_venda'];
				     $produto_model->material_expediente=$outs['material_expediente'];
					 $produto_model->moeda=$outs['moeda'];		 
									 
					if($produto_model->validate())
						{
							$produto_model->save();
							
						}else{
						$erros=$produto_model->getErrors();
						}						 
					 
				}//fim loop
			}//
			
		}
	
		
		
        return $erros;
    }
	

	private function r_char($string,$mode=FALSE) {
		
	   	    $from = "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ";
			$to = "aaaaeeiooouucAAAAEEIOOOUUC";
		
		    $keys = array();
		    $values = array();
		    preg_match_all('/./u', $from, $keys);
		    preg_match_all('/./u', $to, $values);
		    $mapping = array_combine($keys[0], $values[0]);
			
		    $string = strtr($string, $mapping);
		
			if($mode == TRUE)
			{
	        $string = preg_replace("/ /", "_", $string);
	        }
		
		
		
	    return $string;
		
	}

}
