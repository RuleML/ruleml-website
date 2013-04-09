The SVG source file of the model is divided into several layers
whose visibility can be toggled to achieve the 4 different "views".

The views are listed below along with which layers need to be hidden:

1. sublanguages & modules with minimized groups
   - hide only "Modules (Reg)" and "Groups (Reg)"
   (sample filename: ruleml_m12n_09_uml_05-11-22_min.png)

2. sublanguages & modules
   - hide only "Modules (Min)" and "Groups (Min)"
   (sample filename: ruleml_m12n_09_uml_05-11-22.png)

3. sublanguages only with minimized groups
   - hide all "Module" layers and "Groups (Reg)"
   (sample filename: ruleml_m12n_09_uml_05-11-22_subsonly_min.png)

4. sublanguages only
   - hide all "Module" layers and "Groups (Min)"
   (sample filename: ruleml_m12n_09_uml_05-11-22_subsonly.png)

When the visibility of the layers is set correctly for a certain view,
just export as a bitmap (e.g. using Inkscape).  This setup should
increase the maintainability of the model.