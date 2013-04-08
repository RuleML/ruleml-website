









   
;; ---------------------------------------------------------------
;; asserting a ground fact:

(assert (has Stretch hair))





   
;; ---------------------------------------------------------------
;; asserting a ground fact:

(assert (chews Stretch cud))





   
;; ---------------------------------------------------------------
;; asserting a ground fact:

(assert (has Stretch long legs))





   
;; ---------------------------------------------------------------
;; asserting a ground fact:

(assert (has Stretch long neck))





   
;; ---------------------------------------------------------------
;; asserting a ground fact:

(assert (has Stretch tawny color))





   
;; ---------------------------------------------------------------
;; asserting a ground fact:

(assert (has Stretch dark spots))











 	
;; -------------------------------------------------------------------------
(defrule AnimalsRule1
"add rule comment here."
(declare (salience 10))
	   	   
	   	     (has ?x hair)
		   
		
=>
       		   
		   	(assert (isa ?x mammal))
		   
		)






 	
;; -------------------------------------------------------------------------
(defrule AnimalsRule2
"add rule comment here."
(declare (salience 10))
	   	   
	   	     (gives ?x milk)
		   
		
=>
       		   
		   	(assert (isa ?x mammal))
		   
		)






 	
;; -------------------------------------------------------------------------
(defrule AnimalsRule3
"add rule comment here."
(declare (salience 10))
	   	   
	   	     (has ?x feathers)
		   
		
=>
       		   
		   	(assert (isa ?x bird))
		   
		)






 	
;; -------------------------------------------------------------------------
(defrule AnimalsRule4
"add rule comment here."
(declare (salience 10))
		   
	   	      (flies ?x)
	   	      (lays ?x eggs)
		   
		
=>
       		   
		   	(assert (isa ?x bird))
		   
		)






 	
;; -------------------------------------------------------------------------
(defrule AnimalsRule5
"add rule comment here."
(declare (salience 10))
		   
	   	      (isa ?x mammal)
	   	      (eats ?x meet)
		   
		
=>
       		   
		   	(assert (isa ?x carnivore))
		   
		)






 	
;; -------------------------------------------------------------------------
(defrule AnimalsRule6
"add rule comment here."
(declare (salience 10))
		   
	   	      (isa ?x mammal)
	   	      (has ?x pointed teeth)
	   	      (has ?x claws)
	   	      (has ?x forward-pointing eyes)
		   
		
=>
       		   
		   	(assert (isa ?x carnivore))
		   
		)






 	
;; -------------------------------------------------------------------------
(defrule AnimalsRule7
"add rule comment here."
(declare (salience 10))
		   
	   	      (isa ?x mammal)
	   	      (has ?x hoofs)
		   
		
=>
       		   
		   	(assert (isa ?x ungulate))
		   
		)






 	
;; -------------------------------------------------------------------------
(defrule AnimalsRule8
"add rule comment here."
(declare (salience 10))
		   
	   	      (isa ?x mammal)
	   	      (chews ?x cud)
		   
		
=>
       		   
		   	(assert (isa ?x ungulate))
		   
		)







 	
;; -------------------------------------------------------------------------
(defrule AnimalsRule9
"add rule comment here."
(declare (salience 10))
		   
	   	      (isa ?x carnivore)
	   	      (has ?x tawny color)
	   	      (has ?x dark spots)
		   
		
=>
       		   
		   	(assert (isa ?x cheetah))
		   
		)







 	
;; -------------------------------------------------------------------------
(defrule AnimalsRule10
"add rule comment here."
(declare (salience 10))
		   
	   	      (isa ?x carnivore)
	   	      (has ?x tawny color)
	   	      (has ?x black strips)
		   
		
=>
       		   
		   	(assert (isa ?x tiger))
		   
		)







 	
;; -------------------------------------------------------------------------
(defrule AnimalsRule11
"add rule comment here."
(declare (salience 10))
		   
	   	      (isa ?x ungulate)
	   	      (has ?x long legs)
	   	      (has ?x long neck)
	   	      (has ?x tawny color)
	   	      (has ?x dark spots)
		   
		
=>
       		   
		   	(assert (isa ?x girafe))
		   
		)







 	
;; -------------------------------------------------------------------------
(defrule AnimalsRule12
"add rule comment here."
(declare (salience 10))
		   
	   	      (isa ?x ungulate)
	   	      (has ?x white color)
	   	      (has ?x black stripes)
		   
		
=>
       		   
		   	(assert (isa ?x zebra))
		   
		)







 	
;; -------------------------------------------------------------------------
(defrule AnimalsRule13
"add rule comment here."
(declare (salience 10))
		   
	   	      (isa ?x bird)
	   	      (doesnot ?x fly)
	   	      (has ?x long legs)
	   	      (has ?x long neck)
	   	      (is ?x black_and_white)
		   
		
=>
       		   
		   	(assert (isa ?x ostrich))
		   
		)







 	
;; -------------------------------------------------------------------------
(defrule AnimalsRule14
"add rule comment here."
(declare (salience 10))
		   
	   	      (isa ?x bird)
	   	      (doesnot ?x fly)
	   	      (swims ?x)
	   	      (is ?x black_and_white)
		   
		
=>
       		   
		   	(assert (isa ?x penguin))
		   
		)






 	
;; -------------------------------------------------------------------------
(defrule AnimalsRule15
"add rule comment here."
(declare (salience 10))
		   
	   	      (isa ?x bird)
	   	      (isa ?x good flyer)
		   
		
=>
       		   
		   	(assert (isa ?x albatros))
		   
		)

