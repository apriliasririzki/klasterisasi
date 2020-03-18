<?php 
	if (($a!=NULL) AND ($b==NULL) AND ($c==NULL)AND ($d==NULL)AND ($e==NULL)) {
		$title=$a;
	} elseif (($a!=NULL) AND ($b!=NULL) AND ($c==NULL)AND ($d==NULL)AND ($e==NULL)) {
		$title=$b.$pemisah.$a;
	} elseif (($a!=NULL) AND ($b!=NULL) AND ($c!=NULL)AND ($d==NULL)AND ($e==NULL)) {
		$title=$c.$pemisah.$b.$pemisah.$a;
	} elseif (($a!=NULL) AND ($b!=NULL) AND ($c!=NULL)AND ($d!=NULL)AND ($e==NULL)) {
		$title=$d.$pemisah.$c.$pemisah.$b.$pemisah.$a;
	} elseif (($a!=NULL) AND ($b!=NULL) AND ($c!=NULL)AND ($d!=NULL)AND ($e!=NULL)) {
		$title=$e.$pemisah.$d.$pemisah.$c.$pemisah.$b.$pemisah.$a;;
	}
?>