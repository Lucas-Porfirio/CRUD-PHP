
<?php
$resultados= '';
foreach ($vagas as $vaga){
    $resultados.='<tr>
                    <td>'.$vaga->id.'</td>
                    <td>'.$vaga->titulo.'</td>
                    <td>'.$vaga->descricao.'</td>
                    <td>'.($vaga->ativo== 's'?'Ativo':'Inativo').'</td>
                    <td>'.date('d/m/Y à\s H:i:s',strtotime($vaga->data)).'</td>
                    <td>
                        <a href="editar.php?id='.$vaga->id.'">
                            <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir.php?id='.$vaga->id.'">
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                    </td>
                  </tr>';
}
?>
<main>
    <section>
        <a class="btn btn-success"href="cadastrar.php">
            Nova Vaga
        </a>
    </section>

    <section>
        <table class="table bg-light text-dark mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TÍtulo</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>           
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>

        </table>

    </section>
</main>