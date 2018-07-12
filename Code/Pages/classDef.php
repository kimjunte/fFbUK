	<?php

		class itemList{
			//These are item within a 'LIST' you make in the php(HTML) document. Each new list will have 3 intitla values
			public $item = array("First Comment.","Second Comment.","Third Comment.");
			

			public function addItem($string){
				array_push($this->item,$string);
			}
			public function showItem($i){
				return $this->item[$i];
			}

			public function displayList(){
				
				for($i =0; $i<sizeof($this->item);$i++){
					echo "<li>";
					echo $this->showItem($i) ." ";
					echo "</li>";
				}
				
			}
		}
	?>


