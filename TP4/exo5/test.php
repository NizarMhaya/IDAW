<?php
// Votre JSON
$json_data = '{
    "Collection": {
        "Name": "WorldTimerPanel",
        "ViewPort": {
            "xorigin": 0,
            "yorigin": 0,
            "width": 3840,
            "height": 2160,
            "alignment": "TopLeft"
        },
        "Widgets": [{
            "Widget": {
                "Type": "Anchor",
                "Name": "WorldTimer",
                "Anchor": {
                    "xorigin": 1700,
                    "yorigin": 0,
                    "alignment": "TopLeft"
                },
                "ChildWidgets": [{
                    "Widget": {
                        "Type": "Label",
                        "Name": "WorldTimerLabel",
                        "ViewPort": {
                            "xorigin": -570,
                            "yorigin": 115,
                            "width": 280,
                            "height": 70,
                            "alignment": "TopLeft"
                        }
                    }
                }]
            }
        }]
    }
}';

// Décoder le JSON en une structure de données PHP (objet stdClass)
$data = json_decode($json_data);

// Accéder à certaines valeurs spécifiques
$collectionName = $data->Collection->Name;
$viewPortWidth = $data->Collection->ViewPort->width;
$widgetType = $data->Collection->Widgets[0]->Widget->Type;
$labelWidth = $data->Collection->Widgets[0]->Widget->ChildWidgets[0]->Widget->ViewPort->width;

// Afficher les valeurs
echo 'Nom de la collection : ' . $collectionName . '<br>'; // Affiche : Nom de la collection : WorldTimerPanel
echo 'Largeur du ViewPort : ' . $viewPortWidth . '<br>'; // Affiche : Largeur du ViewPort : 3840
echo 'Type du Widget : ' . $widgetType . '<br>'; // Affiche : Type du Widget : Anchor
echo 'Largeur du Label : ' . $labelWidth . '<br>'; // Affiche : Largeur du Label : 280
