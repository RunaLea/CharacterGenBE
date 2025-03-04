-- join for characters, races and backgrounds
use character_gen_runa;
SELECT characters.id, 
characters.char_name, 
characters.char_lvl, 
races.race_title, 
characters.race_id, 
backgrounds.bg_title, 
characters.bg_id
FROM characters
INNER JOIN races ON races.id=characters.race_id
INNER JOIN backgrounds ON backgrounds.id=characters.bg_id

-- join for characters, classes and subclasses
use character_gen_runa;
SELECT characters.id, 
characters.char_name, 
characters.char_lvl,
classes.class_title,
char_classes.class_lvl,
subclasses.subclass_title
FROM characters
INNER JOIN char_classes ON characters.id=char_classes.char_id
INNER JOIN classes ON classes.id=char_classes.class_id
INNER JOIN subclasses ON subclasses.id=char_classes.subclass_id;