<?php


namespace App\PageBuilder\Addons\Counterup;
use App\Brand;
use App\Counterup;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use App\PageBuilder\Fields\IconPicker;
use App\PageBuilder\Fields\Image;
use App\PageBuilder\Fields\Number;
use App\PageBuilder\Fields\Select;
use App\PageBuilder\Fields\Slider;
use App\PageBuilder\Fields\Text;
use App\PageBuilder\Fields\Textarea;
use App\PageBuilder\PageBuilderBase;
use App\ProductCategory;
use App\Testimonial;

class CounterupAreaStyleOne extends PageBuilderBase
{

    /**
     * @inheritDoc
     */
    public function preview_image()
    {
       return 'counterup/01.png';
    }

    /**
     * @inheritDoc
     */
    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();

        $output .= Image::get([
            'name' => 'background_image',
            'label' => __('Background Image'),
            'value' => $widget_saved_values['background_image'] ?? null,
            'dimensions' => __('set order by')
        ]);

        $output .= Select::get([
            'name' => 'order_by',
            'label' => __('Order By'),
            'options' => [
                'id' => __('ID'),
                'created_at' => __('Date'),
            ],
            'value' => $widget_saved_values['order_by'] ?? null,
            'info' => __('set order by')
        ]);
        $output .= Select::get([
            'name' => 'order',
            'label' => __('Order'),
            'options' => [
                'asc' => __('Accessing'),
                'desc' => __('Decreasing'),
            ],
            'value' => $widget_saved_values['order'] ?? null,
            'info' => __('set order')
        ]);
        $output .= Number::get([
            'name' => 'items',
            'label' => __('Items'),
            'value' => $widget_saved_values['items'] ?? null,
            'info' => __('enter how many item you want to show in frontend'),
        ]);

        $output .= Slider::get([
            'name' => 'margin_minus_top',
            'label' => __('Margin Minus Top'),
            'value' => $widget_saved_values['margin_minus_top'] ?? 0,
            'max' => 500,
        ]);
        $output .= Slider::get([
            'name' => 'padding_top',
            'label' => __('Padding Top'),
            'value' => $widget_saved_values['padding_top'] ?? 50,
            'max' => 200,
        ]);
        $output .= Slider::get([
            'name' => 'padding_bottom',
            'label' => __('Padding Bottom'),
            'value' => $widget_saved_values['padding_bottom'] ?? 50,
            'max' => 200,
        ]);

        // add padding option

        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    /**
     * @inheritDoc
     */
    public function frontend_render()
    {




        $settings = $this->get_settings();
        $current_lang = LanguageHelper::user_lang_slug();
        $order_by = SanitizeInput::esc_html($settings['order_by']);
        $order = SanitizeInput::esc_html($settings['order']);
        $items = SanitizeInput::esc_html($settings['items']);
        $padding_top = SanitizeInput::esc_html($settings['padding_top']);
        $padding_bottom = SanitizeInput::esc_html($settings['padding_bottom']);
        $margin_minus_top = SanitizeInput::esc_html($settings['margin_minus_top']);
        $background_image = render_background_image_markup_by_attachment_id($settings['background_image']);


        $counterup = Counterup::query()->where(['lang' => $current_lang])->orderBy($order_by,$order)->get();

        if(!empty($items)){
            $counterup = $counterup->take($items);
        }
        $counterup_item_markup = '';

            $a = 1;
        foreach ($counterup as $item){
            $number = $item->number;
            $extra_text = $item->extra_text;
            $title = $item->title;
            $counterup_item_markup .= <<<HTML
<div class="col-lg-3 col-md-6">
    <div class="cagency-counterup-item">
        <div class="number style-{$a}">
            <div class="count-wrap"><span class="count-num">{$number}</span>{$extra_text}</div>
        </div>
        <div class="content">
            <h4 class="title">{$title}</h4>
        </div>
    </div>
</div>
HTML;
             ($a === 4) ? $a= 1 : $a++;
        }


        return <<<HTML
<div class="cagency-counterup-area course-bg" data-margin-minus-top="{$margin_minus_top}" data-padding-top="{$padding_top}" data-padding-bottom="{$padding_bottom}" {$background_image}>
    <div class="container">
        <div class="row">
              {$counterup_item_markup}
        </div>
    </div>
</div>
HTML;

    }

    /**
     * @inheritDoc
     */
    public function addon_title()
    {
        return __('Counterup: 01');
    }
}