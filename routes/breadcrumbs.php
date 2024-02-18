<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


// breadcrumbs prevus au responsable

// dashboard

Breadcrumbs::for('home', function (BreadcrumbTrail $trail): void {
    $trail->push('home', route('home'));
});

//  employe

Breadcrumbs::for('ListeEmployer', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Liste des employés', route('ListeEmployer'));
});

Breadcrumbs::for('NouveauEmploye', function (BreadcrumbTrail $trail): void {
    $trail->parent('ListeEmployer');
    $trail->push('Nouveau employé', route('NouveauEmploye'));
});
Breadcrumbs::for('RechercheEmploye', function (BreadcrumbTrail $trail): void {
    $trail->parent('ListeEmployer');
    $trail->push('Recherche Employe', route('RechercheEmploye'));
});


Breadcrumbs::for('EditEmploye', function (BreadcrumbTrail $trail, $id): void {
    $trail->parent('ListeEmployer');
    $trail->push('Modifier employé', route('EditEmploye', $id));
});

// services

Breadcrumbs::for('listeServices', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Liste des services', route('listeServices'));
});

Breadcrumbs::for('addService', function (BreadcrumbTrail $trail): void {
    $trail->parent('listeServices');
    $trail->push('Nouveau service', route('addService'));
});


Breadcrumbs::for('editService', function (BreadcrumbTrail $trail, $id): void {
    $trail->parent('listeServices');
    $trail->push('Modifier service', route('editService', $id));
});

// poste

Breadcrumbs::for('listePostes', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Liste des postes', route('listePostes'));
});

Breadcrumbs::for('addposte', function (BreadcrumbTrail $trail): void {
    $trail->parent('listePostes');
    $trail->push('Nouveau poste', route('addposte'));
});


Breadcrumbs::for('editposte', function (BreadcrumbTrail $trail, $id): void {
    $trail->parent('listePostes');
    $trail->push('Modifier poste', route('editposte', $id));
});


// Employer

Breadcrumbs::for('listeAffectation', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('liste Affectation', route('listeAffectation'));
});



Breadcrumbs::for('addAffectation', function (BreadcrumbTrail $trail): void {
    $trail->parent('listeAffectation');
    $trail->push('Nouveau Affectation', route('addAffectation'));
});


// Breadcrumbs::for('editposte', function (BreadcrumbTrail $trail,$id): void {
//     $trail->parent('listeAffectation');
//     $trail->push('Modifier poste', route('editposte',$id));
// });



// Absence

Breadcrumbs::for('listeAbsence', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Liste des absences', route('listeAbsence'));
});

Breadcrumbs::for('addAbsence', function (BreadcrumbTrail $trail): void {
    $trail->parent('listeAbsence');
    $trail->push('Nouveau Absence', route('addAbsence'));
});


// Breadcrumbs::for('editposte', function (BreadcrumbTrail $trail,$id): void {
//     $trail->parent('listeAffectation');
//     $trail->push('Modifier poste', route('editposte',$id));
// });


// breadcrumbs prevus a l'admin

Breadcrumbs::for('listeUtilisateurs', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Liste des utilisateurs', route('listeUtilisateurs'));
});


// Employe

Breadcrumbs::for('Employe', function (BreadcrumbTrail $trail): void {
    $trail->push('Profile Employe', route('Employe'));
});