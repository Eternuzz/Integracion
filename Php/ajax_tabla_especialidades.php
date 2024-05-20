
                                <table>
                                    <thead>
                                    <tr>
                                        <th>ID Especialidad</th>
                                        <th>Nombre Especialidad</th>
                                        <th style="width: 15%;"></th>
                                        <th style="width: 15%;"></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        
                                        require_once 'conexion.php';

                                        $sql6 = "SELECT * FROM especialidades";   //especialidades
                                        $consulta = mysqli_query($conn, $sql6);
                                        if(mysqli_num_rows($consulta)>0){
                                            while($especi =mysqli_fetch_assoc($consulta)){
                                        ?>
                                        <tr id=specialtable_row_<?php echo $especi['id_especialidad']?>>
                                            <td> <?php echo $especi['id_especialidad'];?></td>
                                            <td> <?php echo $especi['especialidad'];?></td>
                                            <td><button data-modal-target="#modalspecial_<?php echo $especi['id_especialidad'];?>">Detalles</button></td>
                                            <td><button class="delete" id=delete data-user-id="<?php echo $especi['id_especialidad'];?>" data-role="especialidad">Eliminar</button></td>
                                        </tr>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>