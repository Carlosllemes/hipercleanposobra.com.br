<?php

	foreach ($menu as $key => $value) {
		if($sigMenuPosition !== false && $key == $sigMenuPosition) include 'inc/menu-top-inc.php';
		echo '
			<li'.($value[2] ? ' class="dropdown"' : '').'>
				<a href="'.(strpos($value[0], 'http') !== false ? $value[0] : $url.$value[0]).'" title="'.($value[1] == 'Home' ? 'Página inicial' : $value[1]).'" '.(strpos($value[0], 'http') !== false ? 'target="_blank" rel="nofollow"' : "").'>';
				if($value[3] != NULL){
					echo '<i class="fa fa-'.$value[3].' fa-4x"></i><span class="d-block">'.$value[1].'</span>';
				}
				else {
					echo $value[1];
				}
		echo '</a>';

				if($value[2]){
					echo $value[0] == 'informacoes' ? '<ul class="sub-menu-info">' : '<ul class="sub-menu-info">';
						include('inc/'.$value[2].'.php');
					echo '</ul>';
				}

		echo '</li>';
	}

?>