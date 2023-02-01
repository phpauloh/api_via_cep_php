<?php
    require "../ViaCep/vendor/autoload.php";

    use Paulo\ViaCep\app\Requisition;

    $cep = $_POST['inputCEP'];
    
    if(isset($cep)){
        $req = new Requisition();
    
        $req->setCepToUrl($cep);
        $data = $req->triggerRequest();
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Via Cep</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
   <div class="container">
    <div class="row">
        <div class="col-md-12 div-top">
            <h1>CONSUMINDO WEB SERVICE API - VIA CEP</h1>
        </div>
    </div>
            
    <form method="POST" action="<?php echo $PHP_SELF; ?>">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="form-group">
                    <label for="inputCEP">CEP</label>
                    <input type="text" class="form-control" name="inputCEP" id="inputCEP" aria-describedby="CEP" placeholder="Informe o CEP" value="<?php if(isset($data["cep"])){echo $data["cep"];} ?>">
                </div>
                <button type="submit" class="btn btn-success btn-cep">PESQUISAR</button>
                
            </div> 
        </div>

        <div class="row row-divisor">
            <div class="col-md-12">
                <hr/>
            </div>
        </div>

        <div class="row row-form-inputs">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputLog">LOGRADOURO</label>
                    <input type="text" class="form-control" id="inputLog" aria-describedby="Logradouro" placeholder="Logradouro" value="<?php if(isset($data["cep"])){echo $data["logradouro"];}?>">
                </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                    <label for="inputComp">COMPLEMENTO</label>
                    <input type="text" class="form-control" id="inputComp" aria-describedby="Complemento" placeholder="Complemento" value="<?php if(isset($data["cep"])){echo $data["complemento"];}?>">
                </div>
            </div>
        </div>

        <div class="row row-form-inputs">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputBairro">BAIRRO</label>
                    <input type="text" class="form-control" id="inputBairro" aria-describedby="Bairro" placeholder="Bairro" value="<?php if(isset($data["cep"])){echo $data["bairro"];} ?>">
                </div>
            </div>

            <div class="col-md-5">
            <div class="form-group">
                    <label for="inputCid">CIDADE</label>
                    <input type="text" class="form-control border-inputs" id="inputCid" aria-describedby="Cidade" placeholder="Cidade" value="<?php if(isset($data["cep"])){echo $data["localidade"];} ?>" disabled>
                </div>
            </div>

            <div class="col-md-1">
            <div class="form-group">
                    <label for="inputUF">UF</label>
                    <input type="text" class="form-control" id="inputUF" aria-describedby="UF" placeholder="UF" value="<?php if(isset($data["cep"])){echo $data["uf"];} ?>" disabled>
                </div>
            </div>
        </div>
    </form>
   </div>
</body>
</html>