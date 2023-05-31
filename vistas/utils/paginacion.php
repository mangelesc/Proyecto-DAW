<div class="paginacionProductos-div">

    <p>  <?php echo $conteoPaginas; ?> registros disponibles</p>
    
    <ul class="paginacionProductos-lista">
        <?php if ($pagina > 1) { ?>
            <li>
                <a href="<?php echo $urlSelf ?>pagina=<?php echo $pagina - 1 ?>">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php 
        }
        
        for ($x = 1; $x <= $paginas; $x++) { ?>
            <li>
                <a href="<?php echo $urlSelf ?>pagina=<?php echo $x ?>" class="<?php if ($x == $pagina) echo "active" ?>">
                    <?php echo $x ?></a>
            </li>
        <?php 
        } 
        
        if ($pagina < $paginas) { ?>
            <li>
                <a href="<?php echo $urlSelf ?>pagina=<?php echo $pagina + 1 ?>">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php } ?>

    </ul>
</div>