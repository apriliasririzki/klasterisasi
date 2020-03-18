<ol class="breadcrumb">
<?php 
if (($a!=NULL) AND ($b==NULL) AND ($c==NULL)AND ($d==NULL)AND ($e==NULL)) {?>
	<li>
		<strong><a href="<?php echo $base_url;?>"><?php echo $a; ?></a></strong>
	</li>
<?php
} elseif (($a!=NULL) AND ($b!=NULL) AND ($c==NULL)AND ($d==NULL)AND ($e==NULL)) {?>
	<li>
		<a href="<?php echo $base_url;?>"><?php echo $a; ?></a>
	</li>
	<li class="active">
		<strong><a href="<?php echo $base_url.'admin/'.$kb;?>"><?php echo $b; ?></a></strong>
	</li>
<?php
} elseif (($a!=NULL) AND ($b!=NULL) AND ($c!=NULL)AND ($d==NULL)AND ($e==NULL)) { ?>
	<li>
		<a href="<?php echo $base_url;?>"><?php echo $a; ?></a>
	</li>
	<li>
		<a href="<?php echo $base_url.'admin/'.$kb;?>"><?php echo $b; ?></a>
	</li>
	<li class="active">
		<strong><a href="<?php echo $base_url.'admin/'.$kc;?>"><?php echo $c; ?></a></strong>
	</li>
<?php
} elseif (($a!=NULL) AND ($b!=NULL) AND ($c!=NULL)AND ($d!=NULL)AND ($e==NULL)) { ?>
	<li>
		<a href="<?php echo $base_url;?>"><?php echo $a; ?></a>
	</li>
	<li>
		<a href="<?php echo $base_url.'admin/'.$kb;?>"><?php echo $b; ?></a>
	</li>
	<li>
		<a href="<?php echo $base_url.'admin/'.$kc;?>"><?php echo $c; ?></a>
	</li>
	<li class="active">
		<strong><a href="<?php echo $base_url.'admin/'.$kd;?>"><?php echo $d; ?></a></strong>
	</li>
<?php
} elseif (($a!=NULL) AND ($b!=NULL) AND ($c!=NULL)AND ($d!=NULL)AND ($e!=NULL)) { ?>
	<li>
		<a href="<?php echo $base_url;?>"><?php echo $a; ?></a>
	</li>
	<li>
		<a href="<?php echo $base_url.'admin/'.$kb;?>"><?php echo $b; ?></a>
	</li>
	<li>
		<a href="<?php echo $base_url.'admin/'.$kc;?>"><?php echo $c; ?></a>
	</li>
	<li>
		<a href="<?php echo $base_url.'admin/'.$kd;?>"><?php echo $d; ?></a>
	</li>
	<li class="active">
		<strong><a href="<?php echo $base_url.'admin/'.$ke;?>"><?php echo $e; ?></a></strong>
	</li>
<?php
}
?>
</ol>