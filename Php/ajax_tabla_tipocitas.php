
<table>
                                    <thead>
                                    <tr>
                                        <th>ID Tipo Cita</th>
                                        <th>Tipo de Cita</th>
                                        <th style="width: 15%;"></th>
                                        <th style="width: 15%;"></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        
                                        require_once 'conexion.php';

                                        $sql5 = "SELECT * FROM tipo_cita";   //tipo citas
                                        $tcita_query = mysqli_query($conn, $sql5);
                                        if(mysqli_num_rows($tcita_query)>0){
                                            while($tcita =mysqli_fetch_assoc($tcita_query)){
                                        ?>
                                        <tr id=tipoctable_row_<?php echo $tcita['id']?>>
                                            <td> <?php echo $tcita['id'];?></td>
                                            <td> <?php echo $tcita['enombre'];?></td>
                                            <td><button data-modal-target="#modaltipocita_<?php echo $tcita['id'];?>">Detalles</button></td>
                                            <td><button class="delete" data-user-id="<?php echo $tcita['id'];?>" data-role="tipocita" >Eliminar</button></td>
                                        </tr>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>

>>>>>>> d71bce68f597541ba9042ab1eae4bf9d91869726
                                </table>