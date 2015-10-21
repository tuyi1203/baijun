<?php
class clsSystemCacheDefaultController extends clsAppController {

    /**
     * 清除缓存
     */
    public function _clear() {
		$this->rrmdir(APATH_VIEWS_C);
		$this->output->result = 'success';
    }

    private function rrmdir($dir) {
    	if (is_dir($dir)) {
    		$objects = scandir($dir);
    		foreach ($objects as $object) {
    			if ($object != "." && $object != "..") {
    				if (filetype($dir."/".$object) == "dir") $this->rrmdir($dir."/".$object); else unlink($dir."/".$object);
    			}
    		}
    		reset($objects);
    		rmdir($dir);
    	}
    }
}
