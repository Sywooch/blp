<?php

namespace app\models;

/**
 * Description of ImageResize
 *
 * @author Sergey Kulikov <syrex92@gmail.com>
 */
class ImageResize 
{
    
    public $width;
    public $height;
    public $image;
    public $new_image;
    public $show_substrate;
    public $color;
    
    public function __construct()
    {
        $this->new_image = '/new_image.jpg';
        $this->show_substrate = false;
        $this->color = [0, 0, 0];
    }
    
    /**
     * Выполняет изменение размера изображения
     * @param int $this->width Ширина результирующего изображения
     * @param int $this->height Высота результирующего изображения
     * @param string $this->image Адрес исходного изображения
     * @param string $this->new_image Адрес результирующего изображения 
     * @param boolean $this->show_substrate Отображать подложку
     * @param array $this->color Цвет подложки в формате RGB
     * @return string
     */
    public function resize()
    {
        
        if(!file_exists($this->image))
            return 'file is not exists';
        
        $image_size = getimagesize($this->image);
        $old_image = [
            'width' => $image_size[0],
            'height' => $image_size[1],
            'path' => $this->image
        ];
        $new_image = [
            'width' => $this->width,
            'height' => $this->height,
            'path' => $this->new_image
        ];
        
        switch($image_size['mime']) {
            case 'image/jpeg':
                $src_image = imagecreatefromjpeg($this->image); 
                break;
            case 'image/png':
                $src_image = imagecreatefrompng($this->image); 
                break;
            case 'image/gif':
                $src_image = imagecreatefromgif($this->image); 
                break;
        }
        
        $dst_x = 0;
        $src_x = 0;
        $src_y = 0;
        $dst_y = 0;
        $src_w = $new_image['width'];
        $src_h = $new_image['height'];
        
        if($old_image['width']>$new_image['width'])
        {
            $coef = $new_image['width']/$old_image['width'];
            $new_old_image = [
                'width' => $old_image['width']*$coef,
                'height' => $old_image['height']*$coef,
                'path' => $old_image['path']
            ];
            $temp_image = imagecreatetruecolor($new_old_image['width'], $new_old_image['height']);
            imagecopyresampled($temp_image, $src_image, 0, 0, 0, 0, $new_old_image['width'], $new_old_image['height'], $old_image['width'], $old_image['height']);
            $old_image = $new_old_image;
            $src_image = $temp_image;
            $src_x = ($old_image['width']-$new_image['width'])/2;
        }
        elseif($old_image['width']<$new_image['width'])
        {
            $dst_x = ($new_image['width']-$old_image['width'])/2;
        }
        
        if($old_image['height']>$new_image['height'])
            $src_y = ($old_image['height']-$new_image['height'])/2;
        elseif($old_image['height']<$new_image['height'])
        {
            if($this->show_substrate)
                $dst_y = ($new_image['height']-$old_image['height'])/2;
            else
                $src_h = $old_image['height'];
        }
                    
        $dst_image = imagecreatetruecolor($src_w, $src_h);
        
        $color = imagecolorallocate($dst_image, $this->color[0], $this->color[1], $this->color[2]);
        
        imagefill($dst_image, 0, 0, $color);
        
        imagecopy($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h);
        
        if($old_image['width']<$new_image['width'] || ($old_image['height']<$new_image['height'] && $this->show_substrate))
            imagefill($dst_image, $src_w-1, $src_h-1, $color);
        
        imagepng($dst_image, $_SERVER['DOCUMENT_ROOT'].$this->new_image);
        
        return $this->new_image;
    }
    
}
