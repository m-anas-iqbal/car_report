<?php
foreach(File::allFiles(__DIR__.'/Routes/Frontend') as $partial){
	require_once $partial->getPathName();
}
