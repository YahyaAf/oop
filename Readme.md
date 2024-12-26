
## Documentation : Programmation Orientée Objet (POO) en PHP

### 1. Goal of the OOP

#### Définition :
La POO consiste à modéliser des entités du monde réel en utilisant des objets. Ces objets regroupent des données (propriétés) et des comportements (méthodes) pour mieux structurer le code.

#### Avantages :
- **Réutilisabilité** : Grâce à l’héritage et à la modularité.
- **Scalabilité** : Facile à faire évoluer.
- **Maintenabilité** : Simplifie la gestion et la correction du code.

---

### 2. Core OOP Concepts

#### Encapsulation :
Protège les données internes en limitant leur accès direct via des modificateurs comme `private` et `protected`. Cela garantit que seules les méthodes autorisées peuvent modifier l’état de l’objet.

#### Abstraction :
Expose uniquement les fonctionnalités essentielles en masquant les détails complexes. Cela permet de simplifier la compréhension et l’utilisation des objets.

#### Inheritance :
Permet à une classe enfant d’hériter des propriétés et méthodes d’une classe parente, ce qui favorise la réutilisation et l’extension du code existant.

#### Polymorphism :
Autorise des méthodes avec le même nom mais des comportements différents dans plusieurs classes, ce qui permet une grande flexibilité dans la conception du code.

---

### 3. Classes and Objects

#### 3.1. Définir une classe et créer un objet :
Une classe est un plan ou un modèle pour créer des objets. Un objet est une instance de cette classe.

```php
<?php
class Voiture {
    public $marque;
    public $couleur;

    public function afficherDetails() {
        echo "La voiture est une $this->marque de couleur $this->couleur.
";
    }
}

$maVoiture = new Voiture();
$maVoiture->marque = "Toyota";
$maVoiture->couleur = "Rouge";
$maVoiture->afficherDetails(); // La voiture est une Toyota de couleur Rouge.
?>
```

#### 3.2. Propriétés et Méthodes :
Les propriétés sont des attributs d’une classe, et les méthodes sont des fonctions associées à une classe. Ensemble, ils permettent aux objets de stocker des données et d’effectuer des actions.

```php
<?php
class Personne {
    public $nom;

    public function direBonjour() {
        echo "Bonjour, je m'appelle $this->nom.
";
    }
}

$personne = new Personne();
$personne->nom = "Yahya";
$personne->direBonjour(); // Bonjour, je m'appelle Yahya.
?>
```

#### 3.3. Constructeurs et Destructeurs :
- **Constructeur (`__construct`) :** Permet d’initialiser les propriétés lors de la création d’un objet. C’est utile pour passer des valeurs initiales directement lors de l’instanciation.
- **Destructeur (`__destruct`) :** Nettoie les ressources lorsque l’objet n’est plus utilisé. Cela peut être utile pour fermer des fichiers ou des connexions.

```php
<?php
class Fichier {
    private $nom;

    public function __construct($nom) {
        $this->nom = $nom;
        echo "Fichier $nom ouvert.
";
    }

    public function __destruct() {
        echo "Fichier $this->nom fermé.
";
    }
}

$fichier = new Fichier("document.txt");
?>
```

#### 3.4. Modificateurs d'Accès :
Les modificateurs d’accès définissent la visibilité des propriétés et méthodes :
- **public** : Accessible partout.
- **private** : Accessible uniquement dans la classe.
- **protected** : Accessible dans la classe et ses enfants.

Voici un exemple montrant comment utiliser des getters et setters pour contrôler l’accès aux données privées.

```php
<?php
class CompteBancaire {
    private $solde;

    public function __construct($soldeInitial) {
        $this->solde = $soldeInitial;
    }

    public function getSolde() {
        return $this->solde;
    }

    public function deposer($montant) {
        $this->solde += $montant;
    }
}

$compte = new CompteBancaire(100);
$compte->deposer(50);
echo $compte->getSolde(); // 150
?>
```

---

### 4. Inheritance

#### Parent et enfant :
L’héritage permet de créer une classe à partir d’une autre en réutilisant ses propriétés et méthodes. Cela facilite l’évolution et la personnalisation du code.

```php
<?php
class Animal {
    public function parler() {
        echo "Cet animal fait un bruit.
";
    }
}

class Chien extends Animal {
    public function parler() {
        echo "Le chien aboie.
";
    }
}

$chien = new Chien();
$chien->parler(); // Le chien aboie.
?>
```

---

### 5. Abstract Classes

Les classes abstraites servent de modèle pour d’autres classes et ne peuvent pas être instanciées. Elles définissent des méthodes abstraites qui doivent être implémentées par les classes enfants.

```php
<?php
abstract class Forme {
    abstract public function aire();
}

class Rectangle extends Forme {
    private $longueur;
    private $largeur;

    public function __construct($longueur, $largeur) {
        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }

    public function aire() {
        return $this->longueur * $this->largeur;
    }
}

$rectangle = new Rectangle(5, 3);
echo $rectangle->aire(); // 15
?>
```

---

### 6. Interfaces

Les interfaces permettent de définir un contrat pour les classes qui les implémentent. Cela garantit que ces classes contiennent certaines méthodes précisées dans l’interface.

```php
<?php
interface Vehicule {
    public function demarrer();
    public function arreter();
}

class Voiture implements Vehicule {
    public function demarrer() {
        echo "La voiture démarre.
";
    }

    public function arreter() {
        echo "La voiture s'arrête.
";
    }
}

$voiture = new Voiture();
$voiture->demarrer(); // La voiture démarre.
$voiture->arreter();  // La voiture s'arrête.
?>
```

---

### 7. Static Methods and Properties

Les méthodes et propriétés statiques appartiennent à la classe elle-même et non à ses objets. Elles sont utiles pour les constantes ou les fonctions utilitaires qui n’ont pas besoin de l’état d’un objet.

```php
<?php
class MathUtil {
    public static $pi = 3.14;

    public static function carre($nombre) {
        return $nombre * $nombre;
    }
}

echo MathUtil::$pi; // 3.14
echo MathUtil::carre(4); // 16
?>
```

---

### 8. Namespaces and Autoloading

#### Namespaces :
Ils permettent d’organiser le code en évitant les conflits entre les noms de classes ou fonctions dans différents fichiers.

```php
<?php
namespace MonProjet;

class Utilisateur {
    public function afficherNom() {
        echo "Utilisateur du projet.
";
    }
}

$utilisateur = new Utilisateur();
$utilisateur->afficherNom();
?>
```

#### Autoloading :
Avec Composer, il est possible de charger automatiquement les classes grâce à l’autoloader. Voici un exemple basique d’autoloader manuel :

```php
<?php
spl_autoload_register(function ($classe) {
    include $classe . '.php';
});

$utilisateur = new Utilisateur();
?>
```
