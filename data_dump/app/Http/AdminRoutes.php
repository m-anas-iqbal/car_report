<?php
foreach(File::allFiles(__DIR__.'/Routes/Backend') as $partial){
	require_once $partial->getPathName();
}
