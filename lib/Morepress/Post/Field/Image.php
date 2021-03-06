<?php

namespace Morepress\Post\Field;

class Image extends \Morepress\Post\Field
{

	protected $_prefix_id = '';
	public function html($meta, $repeatable = null){
		is_array($meta) and $meta = null;
		$name = is_null($repeatable) ? $this->_name : $this->_name.'['.$repeatable.']';
		$id = is_null($repeatable) ? $this->_id : $this->_id.'_'.$repeatable;
		$image = null;
		if ($meta) {
			$image = wp_get_attachment_image_src($meta, 'original');
			$image = $image[0];
		}
        $classes = array();
        if(! empty($this->_params['context']) and $this->_params['context'] != 'side')
        {
            $classes[] = 'form-field';
        }
        $classes = implode(' ', $classes);
        empty($classes) or $classes = ' class="'.$classes.'"';
		echo '<tr'.$classes.'>';
		echo '
			<th>
				<label for="'.$id . '">'.$this->_label.'</label>
			</th>
			<td>
				<input name="'.$name.'" type="hidden" class="upload_image" value="'.$meta.'">
                <div class="upload_preview"><img src="'.$image.'" class="preview_image" height="150" alt=""></div>
				<p>
					<input class="upload_image_button button" type="button" value="Choisir une image">
					<a href="#" class="clear_image_button button">Supprimer l\'image</a>
				</p>
			';
		if(!empty($this->_description))
		{
			echo '<p class="description">' . $this->_description . '</p>';
		}
		echo '</td>';
		echo '</tr>';
	}
}