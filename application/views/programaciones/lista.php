<table class="table">
	<thead>
		<tr>
		<th scope="col">Num</th>
		<th scope="col">Estudiante</th>
		<th scope="col">Opciones</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$num = 1; 
		foreach ($estudiantes as $item):
		?>
		<tr>
			<td><?php echo $num;?></td>
            <td><?php echo $item['nombre_completo'];?></td>
            
            <td>
            	<a onclick="return confirmar()" href="<?php echo base_url()?>index.php/Laboratorio/Programaciones/delete?valor=<?php echo $item['id']?>">
	        		<img src="<?php echo base_url()?>images/borrar.png" width="30" height="30">
	        	</a>
	        	<a href="<?php echo base_url()?>index.php/Laboratorio/Programaciones/editar?valor=<?php echo $item['id']?>">
	        		<img src="<?php echo base_url()?>images/editar.ico" width="30" height="30">
	        	</a>
	    	</td>			
  		</tr>
  		<?php
		$num++; 
		endforeach;
  		?>
	</tbody>
</table>
