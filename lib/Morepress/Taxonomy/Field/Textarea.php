<?php

namespace Morepress\Taxonomy\Field;

class Textarea extends \Morepress\Taxonomy\Field
{
	protected $_taxonomy;
	protected $_type = 'textarea';
	protected $_slug;
	protected $_params = array();

	public function callback($term = null)
	{
        if (! empty($term)) {
            $mp_term = \Morepress\Term::forge($term);
        ?>
			<tr class="form-field">
				<th scope="row" valign="top">
					<label for="term_meta_<?php echo $this->_slug; ?>"><?php echo $this->_params['label']; ?></label>
				</th>
				<td>
                    <textarea id="term_meta_<?php echo $this->_slug; ?>" name="term_meta[<?php echo $this->_slug; ?>]"><?php echo esc_attr($mp_term->getMeta($this->_slug)); ?></textarea>
					<?php if(! empty($this->_params['description'])) : ?>
						<p class="description"><?php echo $this->_params['description']; ?></p>
					<?php endif; ?>
				</td>
			</tr>
			<?php
		}
	}
}
