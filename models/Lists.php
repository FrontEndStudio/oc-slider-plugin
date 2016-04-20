<?php namespace Fes\Slider\Models;

use Model;

/**
 * Model
 */
class Lists extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'fes_slider_list';


    /*
     * Validation
     */
    public $rules = [
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = true;

    public $attachOne = [
        'image' => ['System\Models\File', 'delete' => 'true']
    ];

    public function afterDelete()
    {
        $this->image->delete();
    }

    public function getThumbAttribute()
    {


        if ($this->image) {

            list($width, $height) = getimagesize($this->image->getLocalPath());

            if ($width == $height) {
                return '<img src="'.$this->image->getThumb(50, 50, 'crop').'" />';
            } elseif ($width > $height) {
                 return '<img src="'.$this->image->getThumb(50, 50, 'landscape').'" />';
            } else {
                return '<img src="'.$this->image->getThumb(50, 50, 'portrait').'" />';
            }

        }

    }

    //
    // Scopes
    //

    public function scopeIsActiveStatus($query)
    {
        return $query
        ->whereNotNull('status')
        ->where('status', true);
    }
}
