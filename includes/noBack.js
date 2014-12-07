/**
* Este archivo se encarga de evitar que regreses cuando estas en una pantalla importante.
*
* @category   Proyecto
* @package    Sistema de Inscripciones de Natacion
* @author     Azael Alberto Alanis Garza <azaelalanis.g@gmail.com>
* @author     Andres Gerardo Cavazos Hernandez <andrscvz@gmail.com>
* @author			Eugenio Jose Martinez Ramos <eugeniomartinez92@gmail.com>
* @author			Roberto Carlos Rivera Martinez <robert_rivmtz@hotmail.com>
* @author			Hector Palomares Gonzalez <hpalomares@itesm.mx>
* @copyright  2014
* @license    The MIT License
* @version    1.0
* @link       https://github.com/azaelalanis/Sistema-de-Inscripciones-de-Natacion.git
*/

window.onload = function () {
  if (typeof history.pushState === "function") {
    history.pushState("jibberish", null, null);
    window.onpopstate = function () {
      history.pushState('newjibberish', null, null);
      // Handle the back (or forward) buttons here
      // Will NOT handle refresh, use onbeforeunload for this.
    };
  }
  else {
    var ignoreHashChange = true;
    window.onhashchange = function () {
      if (!ignoreHashChange) {
        ignoreHashChange = true;
        window.location.hash = Math.random();
        // Detect and redirect change here
        // Works in older FF and IE9
        // * it does mess with your hash symbol (anchor?) pound sign
        // delimiter on the end of the URL
      }
      else {
        ignoreHashChange = false;
      }
    };
  }
}
