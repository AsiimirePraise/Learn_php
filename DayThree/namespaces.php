<?php
namespace Tiny {
    class Fruit {
        public static function munch($bite) {
            print "Here is a tiny munch of $bite.\n";
        }
    }
}

namespace Big {
    class Fruit {
        public static function munch($bite) {
            print "Here is a big munch of $bite.\n";
        }
    }
}

// Using the classes from different namespaces
\Tiny\Fruit::munch("apple");
\Big\Fruit::munch("banana");
?>
