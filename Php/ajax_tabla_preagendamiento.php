
<table>
                                    <thead>
                                    <tr>
                                        <th>Id PreAgendamiento</th>
                                        <th>Nombre Paciente</th>
                                        <th>Fecha</th>
                                        <th>Registro</th>
                                        <th>Tipo Cita</th>
                                        <th style="width: 15%;"></th>
                                        <th style="width: 15%;"></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        
                                        require_once 'conexion.php';

                                        $sql99 = "SELECT * FROM preagendamiento
                                                INNER JOIN usuario ON preagendamiento.id_usuario = usuario.id_usuario
                                                INNER JOIN tipo_cita ON preagendamiento.id_tipo_cita = tipo_cita.id";   //cita
                                        $cita_query = mysqli_query($conn, $sql99);
                                        if(mysqli_num_rows($cita_query)>0){
                                            while($modalci = mysqli_fetch_assoc($cita_query)){
                                        ?>
                                        <tr id=precitatable_row_<?php echo $modalci['id_usuario']?>>
                                            <td> <?php echo $modalci['id_preagendamiento'];?></td>
                                            <td> <?php echo $modalci['nombre'];?></td>
                                            <td> <?php echo $modalci['fecha'];?></td>
                                            <td> <?php echo $modalci['registro'];?></td>
                                            <td> <?php echo $modalci['enombre'];?></td>
                                            <td><button data-modal-target="#modalci_<?php echo $modalci['id_preagendamiento'];?>">Detalles</button></td>
                                            <td><button class="delete" id=delete data-user-id="<?php echo $modalci['id_preagendamiento'];?>" data-role='preagendamiento'>Eliminar</button></td>
                                        </tr>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>