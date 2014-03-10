<?php
/**
 * Navbar
 *
 * Licensed under The GPL3 License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 */

$navbar_id = !isset( $id ) ? 'navbar_main' : $id;
if( !isset( $class ) ) $navbar_class = ( isset( $inverse ) && $inverse ) ? 'navbar navbar-inverse' : 'navbar navbar-default';
else $navbar_class = $class;
if( isset( $fixed ) )
{
	if( $fixed === 'top' ) $navbar_class .= ' navbar-fixed-top';
	else if( $fixed === 'bottom' ) $navbar_class .= ' navbar-fixed-bottom';
}
?>
<nav class="<?php echo $navbar_class; ?>" role="navigation">
	<div class="container<?php if( isset( $fluid ) && $fluid ) echo '-fluid'; ?>">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#<?php echo $navbar_id; ?>">
				<span class="sr-only"><?php echo !isset( $desc ) ? __('Toggle navigation') : $desc; ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><?php echo !isset( $title ) ? __('Actions') : $title; ?></a>
		</div>
		<div class="collapse navbar-collapse" id="<?php echo $navbar_id; ?>">
		<?php
			if( isset( $items ) )
			{
				foreach( $items as $item )
				{
					if( $item[0] == 'list' )
					{
						echo '<ul class="nav navbar-nav', !isset( $item[2] ) ? '' : ( ' ' . $item[2] ), "\">\n";
						foreach( $item[1] as $title => $link ) echo '<li', ( isset( $active ) && $active == $title ) ? ' class="active"' : '', '>', $this->Html->link( __($title), $link ), '</li>';
						echo "</ul>\n";
					}
					else if( $item[0] == 'button' ) echo $this->Html->link( $item[1], $item[2], array( 'class' => 'btn btn-default navbar-btn' . ( !isset( $item[3] ) ? '' : ( ' ' . $item[3] ) ) ) ), " \n";
					else if( $item[0] == 'form' )
					{
						echo '<form class="navbar-form', !isset( $item[2] ) ? '' : ( ' ' . $item[2] ), '"><div class="form-group"><input type="text" class="form-control" placeholder="', isset( $item[1]['holder'] ) ? $item[1]['holder'] : __('Search'), '" /></div> ';
						echo '<button type="submit" class="btn ', isset( $item[1]['btn_class'] ) ? $item[1]['btn_class'] : 'btn-default', '">', isset( $item[1]['btn'] ) ? $item[1]['btn'] : __('Submit'), '</button>';
						echo "</form>\n";
					}
					else if( $item[0] == 'text' ) echo '<p class="navbar-text', ( !isset( $item[2] ) ? '' : ( ' ' . $item[2] ) ), '">', $item[1], "</p>\n";
					else echo $item[0], "\n";
				}
			}
		?>
		</div>
	</div>
</nav>
