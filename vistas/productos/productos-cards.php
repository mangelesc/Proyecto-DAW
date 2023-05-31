<!-- Productos -->
        <div class="product-list">
        <?php
    
        foreach($productos as $producto){ ?>
            <div class="wsk-cp-product">
                <div class="wsk-cp-img">
                    <img
                        src="<?php 
                            if (!is_null($producto['imagen']) || !empty($producto['imagen']) ){
                                echo '../../'.$producto['imagen'];
                            } else {
                                echo "../../imgs/default.jpg";
                            }?>"
                        alt="Imagen del producto <?php echo $producto['nombre_producto'];?>"
                        class="img-responsive"
                    />
                </div>
                <div class="wsk-cp-text">
                    <div class="category">
                        <span>
                            <?php
                            $categoria = verCategoria($producto['categoria']);
                            echo $categoria['nombre_categoria'];
                            ?>
                        </span>
                    </div>
                    <div class="title-product">
                        <h3>
                            <?php
                            echo $producto['nombre_producto'];
                            ?>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="wcf-left">
                            <span class="price"> 
                                <?php
                                echo $producto['precio'];
                                ?> €
                            </span>
                        </div>
                        <div class="wcf-right">
                            <a <?php echo 'href="./detalle-producto.php?id_producto='.$producto['id_producto'].'"'; ?> class="buy-btn">
                                + Detalles 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
        }
        ?>
    </div>