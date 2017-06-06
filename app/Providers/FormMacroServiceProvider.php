<?php 
namespace App\Providers;

//use App\Services\Macros;
use Collective\Html\HtmlServiceProvider;
use Form;

class FormMacroServiceProvider extends HtmlServiceProvider
{
  /**
   * Bootstrap the application services.
   *
   * @return void
   */
  public function boot()
  {
      /*Form::macro('selectWeekDay', function () {
          $days = [
              'monday'    => 'Monday',
              'tuesday'   => 'Tuesday',
              'wednesday' => 'Wednesday',
              'thursday'  => 'Thursday',
              'friday'    => 'Friday',
              'saturday'  => 'Saturday',
              'sunday'    => 'Sunday',
          ];
          return Form::select('day', $days, null, ['class' => 'form-control']);
      });*/
  }

  /**
   * Register any application services.
   *
   * @return void
   */
 public function register()
 {
    // Macros must be loaded after the HTMLServiceProvider's
    // register method is called. Otherwise, csrf tokens
    // will not be generated
    parent::register();

    Form::macro('selectMacro', function($require, $fieldMachineName, $fieldName, $entity, $remember , $old=null)
    {
      if ( $old != null && $remember != $old) {
        $remember = $old;
      }
      $field  = '<select name="'.$fieldMachineName.'">';
      $field .= '<option disabled selected>Choose his '.$fieldName.'</option>';

      if ($require) {
        foreach ($entity as $entityName) {
          $field .= '<option  value="'.$entityName.'" '.selected_fields($entityName,  $remember, "selected").' >'.ucfirst($entityName) .'</option>';
        }
        $field .= '</select>';
        $field .= '<label>'.ucfirst( $fieldName ).'</label>';

        return $field;
      }
      else{

        foreach ($entity as $id => $entityName) {
          $field .= '<option  value="'.$id.'" '.selected_fields($id,  $remember, "selected").' >'.$entityName .'</option>';
        }
        $field .= '<option value="" '. selected_fields(null,  $remember, "selected") .'>No '.$fieldName.'</option>';
        $field .= '</select>';
        $field .= '<label>'.ucfirst( $fieldName ).'</label>';

        return $field;

      }


    });



    Form::macro('inputMacro', function( $type, $fieldName, $fieldMachineName, $remember=null, $old=null )
    {
      if ( $old != null && $remember != $old) {
        $remember = $old;
      }
      if ($remember===null) {
        $remember='';
      }

      $fieldNameUC = ucfirst( $fieldName );
      $positionTiret = strpos($fieldNameUC,'_');

      if ( $positionTiret ) {
        $changeCharacter = substr( $fieldNameUC , $positionTiret+1 , 1 );
        $fieldNameUC = substr_replace( $fieldNameUC , ' ', $positionTiret, 1 );
        $fieldNameUC = substr_replace( $fieldNameUC , ucfirst($changeCharacter), $positionTiret+1, 1 );
      }
      
      
      $field  = '<input id="'.$fieldMachineName.'" name="'.$fieldName.'" type="'.$type.'" class="validate" value="'.$remember.'">';
      $field .= '<label for="'.$fieldMachineName.'">'.$fieldNameUC.'</label>';

      return $field;

    });

    Form::macro('textAreaMacro', function( $fieldName, $fieldMachineName, $remember, $old=null )
    {
      if ( $old != null && $remember != $old) {
        $remember = $old;
      }
      
      $field  = '<textarea id="'.$fieldMachineName.'" name="'.$fieldName.'" class="materialize-textarea">'.$remember.'</textarea>';
      $field .= '<label for="'.$fieldMachineName.'">'.ucfirst( $fieldName ).'</label>';

      return $field;

    });

    Form::macro('submitMacro', function( $action, $entityName)
    {
      $field  = '<button class="btn waves-effect waves-light" type="submit">'.ucfirst($action).' this '.$entityName.'<i class="material-icons right">send</i></button>';

      return $field;

    });

    Form::macro('checkboxMacro', function( $fieldName, $fieldMachineName, $entity, $remember)
    {

      $field='';

      foreach ($entity as $id => $entityName) {
        $field .= '<p>';
        $field .= '<input type="checkbox" name="'.$fieldName.'[]" id="'.$fieldMachineName.$id.'" value="'.$id.'" '.selected_fields($id, $remember) .'  />';
        $field .= '<label for="'.$fieldMachineName.$id.'">'.$entityName.'</label>';
        $field .= '</p>';
      }

      return $field;

    });


 }
}
