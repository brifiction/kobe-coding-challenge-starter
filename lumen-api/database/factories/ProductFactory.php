<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->randomElement([
            "10 Days in Africa",
            "10 Days in Europe",
            "10 Days in the Americas",
            "12 Realms",
            "12 Realms: Ancestors Legacy",
            "1st & Goal",
            "51st State: Master Set",
            "7 Wonders",
            "7 Wonders Duel",
            "7 Wonders: Babel",
            "7 Wonders: Cities",
            "7 Wonders: Empires",
            "7 Wonders: Leaders",
            "7 Wonders: Wonder Pack",
            "Above and Below",
            "Abyss",
            "Adventure Land",
            "Agents of SMERSH",
            "Agents of SMERSH: Swagman's Hope",
            "Agricola",
            "Agricola: All Creatures Big and Small",
            "Agricola: All Creatures Big and Small – Even More Buildings Big and Small",
            "Agricola: All Creatures Big and Small – More Buildings Big and Small",
            "Agricola: Farmers of the Moor",
            "Agricola: World Championship Deck – 2011",
            "Albion's Legacy",
            "Alchemists",
            "Alea Iacta Est",
            "Alhambra",
            "Alhambra: The Vizier's Favor",
            "Alien Frontiers",
            "Alien Frontiers: Factions",
            "Among the Stars",
            "Among the Stars: The Ambassadors",
            "The Ancient World",
            "Android: Netrunner",
            "Android: Netrunner – Creation and Control",
            "Android: Netrunner – Honor and Profit",
            "AquaSphere",
            "Arctic Scavengers",
            "Arctic Scavengers: HQ",
            "Arctic Scavengers: Recon",
            "Ascension",
            "Ascension: Apprentice Edition",
            "Ascension: Dreamscape",
            "Ascension: Realms Unraveled",
            "Ascension: Return of the Fallen",
            "Ascension: Year One Collector's Edition",
            "Assault on Doomrock",
            "Automobiles",
            "BANG! The Dice Game",
            "The Battle of Five Armies",
            "Battlestar Galactica: The Board Game",
            "Belfort",
            "Belfort: The Expansion Expansion",
            "Belle of the Ball",
            "Betrayal at House on the Hill",
            "Between Two Cities",
            "Beyond Baker Street",
            "Biblios",
            "Biblios Dice",
            "The Big Book of Madness",
            "Black Fleet",
            "Blood Rage",
            "Blue Moon City",
            "Blue Moon Legends",
            "Blueprints",
            "Bomb Squad",
            "Brew Crafters",
            "Broom Service",
            "Bruges",
            "The Builders: Antiquity",
            "Camel Up",
            "The Captain Is Dead",
            "Captain's Wager",
            "Captain's Wager: The Maelstrom",
            "Carcassonne",
            "Carcassonne: Expansion 1 – Inns & Cathedrals",
            "Carcassonne: Expansion 2 – Traders & Builders",
            "Carcassonne: Expansion 6 – Count, King & Robber",
            "Carcassonne: Hunters and Gatherers",
            "Carcassonne: South Seas",
            "Carcassonne: The Castle",
            "Carcassonne: The City",
            "Carcassonne: The River II",
            "Cardline: Animals",
            "Cards Against Humanity",
            "Castle Panic",
            "Castle Panic: Crossbow promo",
            "Castle Panic: The Wizard's Tower",
            "The Castles of Burgundy",
            "Castles of Mad King Ludwig",
            "Castles of Mad King Ludwig: Secrets",
            "Catan",
            "Catan: Ancient Egypt",
            "Catan Histories: Settlers of America – Trails to Rails",
            "The Cave",
            "Caverna: The Cave Farmers",
            "Caylus Magna Carta",
            "Champions of Midgard",
            "Citadels",
            "City of Iron",
            "Claustrophobia",
            "Codenames",
            "Collapse",
            "Colt Express",
            "Compounded",
            "Compounded: Geiger Expansion",
            "Concordia",
            "Concordia: Britannia / Germania",
            "Concordia: Salsa",
            "Core Worlds",
            "Core Worlds: Galactic Orders",
            "Core Worlds: Revolution",
            "Cosmic Encounter",
            "Cosmic Encounter: Cosmic Incursion",
            "Council of Verona",
            "Council of Verona: Poison Expansion",
            "Coup",
            "Coup: Reformation",
            "Crokinole",
            "Cry Havoc",
            "CV",
            "Dark Moon",
            "Dead Men Tell No Tales",
            "Dead of Winter: A Crossroads Game",
            "Dead of Winter: The Long Night",
            "Deception: Murder in Hong Kong",
            "Defenders of the Realm",
            "Defenders of the Realm: Hero Expansion #1",
            "Defenders of the Realm: Hero Expansion #2",
            "Defenders of the Realm: Hero Expansion #3",
            "Defenders of the Realm: The Dragon Expansion",
            "Descent: Journeys in the Dark (Second Edition)",
            "Descent: Journeys in the Dark (Second Edition) – Dark Elements",
            "Descent: Journeys in the Dark (Second Edition) – Forgotten Souls",
            "Descent: Journeys in the Dark (Second Edition) – Labyrinth of Ruin",
            "Descent: Journeys in the Dark (Second Edition) – Lair of the Wyrm",
            "Descent: Journeys in the Dark (Second Edition) – Nature's Ire",
            "Deus",
            "Diamonds",
            "Dig Down Dwarf",
            "Discoveries: The Journals of Lewis and Clark",
            "Discworld: Ankh-Morpork",
            "Doctor Who: The Card Game",
            "Dominion",
            "Dominion: Prosperity",
            "Doomtown: Reloaded",
            "Dragonwood",
            "Dungeon Fighter",
            "Dungeon Lords",
            "Dungeon Lords: Festival Season",
            "Dungeon Petz",
            "DungeonQuest",
            "Dungeons & Dragons Dice Masters: Battle for Faerûn",
            "Dungeons & Dragons: Attack Wing",
            "Dungeons & Dragons: Attack Wing – Aarakocra Troop Expansion Pack",
            "Dungeons & Dragons: Attack Wing – Ballista Expansion Pack",
            "Dungeons & Dragons: Attack Wing – Frost Giant Expansion Pack",
            "Dungeons & Dragons: Attack Wing – Green Dragon Expansion Pack",
            "Dungeons & Dragons: Attack Wing – Hobgoblin Troop Expansion Pack",
            "Dungeons & Dragons: Attack Wing – Movanic Deva Angel Expansion Pack",
            "Dungeons & Dragons: Attack Wing – Shadow Black Dragon Expansion Pack",
            "Dungeons & Dragons: Attack Wing – Sun Elf Troop Expansion Pack",
            "Dungeons & Dragons: Attack Wing – Sun Elf Wizard Expansion Pack",
            "Dungeons & Dragons: Attack Wing – White Dragon Expansion Pack",
            "Dungeons & Dragons: Attack Wing – Wraith Expansion Pack",
            "Dungeons & Dragons: Castle Ravenloft Board Game",
            "Dungeons & Dragons: Temple of Elemental Evil Board Game",
            "Dungeons & Dragons: The Legend of Drizzt Board Game",
            "Dungeons & Dragons: Wrath of Ashardalon Board Game",
            "Eclipse",
            "Eclipse: Rise of the Ancients",
            "Eclipse: Supernova",
            "Eggs and Empires",
            "El Grande",
            "Elder Sign",
            "Elder Sign: Gates of Arkham",
            "Elder Sign: Unseen Forces",
            "Eldritch Horror",
            "Eldritch Horror: Forsaken Lore",
            "Elysium",
            "Eminent Domain",
            "Eminent Domain: Bonus Planets",
            "Eminent Domain: Escalation",
            "Eminent Domain: Escalation Bonus Pack",
            "Escape: The Curse of the Temple",
            "Escape: The Curse of the Temple – Expansion 1: Illusions",
            "Escape: The Curse of the Temple – Expansion 2: Quest",
            "Euphoria: Build a Better Dystopia",
            "Evolution",
            "Evolution: Flight",
            "Exploding Kittens",
            "Fairy Tale",
            "A Feast for Odin",
            "Fields of Arle",
            "Fields of Green",
            "Five Tribes",
            "Five Tribes: The Artisans of Naqala",
            "Fjords",
            "Flash Point: Fire Rescue",
            "Flash Point: Fire Rescue – 2nd Story",
            "Flash Point: Fire Rescue – Extreme Danger",
            "Flash Point: Fire Rescue – Veteran and Rescue Dog",
            "Forbidden Desert",
            "Forbidden Island",
            "Forge War",
            "Freedom: The Underground Railroad",
            "Fresco",
            "Fresco: Expansion Module 7 – The Scrolls",
            "Fresco: Expansion Modules 4, 5 and 6",
            "Fresco: Expansion Modules 8, 9 and 10",
            "Fresco: The Bishop's Favor",
            "Friday",
            "Galaxy of Trian",
            "Glass Road",
            "Glory to Rome",
            "Go",
            "The Golden Ages",
            "Grand Austria Hotel",
            "The Great Heartland Hauling Co.",
            "Greed",
            "Hanabi",
            "Harry Potter: Hogwarts Battle",
            "Helios",
            "Hive",
            "Hostage Negotiator",
            "Hyperborea",
            "I Say, Holmes! (Second Edition)",
            "Imperial Settlers",
            "Imperial Settlers: Atlanteans",
            "Imperial Settlers: Why Can't We Be Friends",
            "Imperialism: Road to Domination",
            "Impulse",
            "Innovation",
            "Innovation: Echoes of the Past",
            "Ion: A Compound Building Game",
            "Isle of Skye: From Chieftain to King",
            "Istanbul",
            "Jaipur",
            "Jamaica",
            "Keyflower",
            "Keyflower: The Farmers",
            "Keyflower: The Merchants",
            "King of New York",
            "King of Tokyo",
            "King of Tokyo: Halloween",
            "King of Tokyo: Power Up!",
            "Kingdom Builder",
            "Kingdom Builder: Crossroads",
            "King's Pouch",
            "Kingsburg",
            "Kingsburg: To Forge a Realm",
            "Lanterns: The Harvest Festival",
            "Le Havre",
            "Le Havre: The Inland Port",
            "Legendary Encounters: An Alien Deck Building Game",
            "Legends of Andor",
            "Let Them Eat Shrimp!",
            "Lewis & Clark",
            "La Granja",
            "Livestock Uprising",
            "London",
            "Loony Quest",
            "Lord of the Rings",
            "The Lord of the Rings Dice Building Game",
            "The Lord of the Rings: The Card Game",
            "The Lord of the Rings: The Card Game – Heirs of Númenor",
            "The Lord of the Rings: The Card Game – Khazad-dûm",
            "The Lord of the Rings: The Card Game – The Black Riders",
            "The Lord of the Rings: The Card Game – The Hobbit: On the Doorstep",
            "The Lord of the Rings: The Card Game – The Hobbit: Over Hill and Under Hill",
            "The Lord of the Rings: The Card Game – The Lost Realm",
            "The Lord of the Rings: The Card Game – The Road Darkens",
            "The Lord of the Rings: The Card Game – The Treason of Saruman",
            "The Lord of the Rings: The Card Game – The Voice of Isengard",
            "Lord of the Rings: The Confrontation",
            "The Lord of the Rings: The Return of the King Deck-Building Game",
            "Lords of Waterdeep",
            "Lords of Waterdeep: Scoundrels of Skullport",
            "Lost Cities",
            "Lost Cities: The Board Game",
            "Lost Legacy: Flying Garden",
            "Lost Legacy: The Starship",
            "Love Letter",
            "Love Letter: The Hobbit – The Battle of the Five Armies",
            "Lunarchitects",
            "Machi Koro",
            "Machi Koro: Harbor",
            "Mad City",
            "Mage Knight Board Game",
            "Mage Knight Board Game: Krang Character Expansion",
            "Mage Knight Board Game: The Lost Legion Expansion",
            "Mammut",
            "The Manhattan Project",
            "The Manhattan Project: Nations Expansion",
            "Mansions of Madness: Second Edition",
            "Mare Nostrum: Empires",
            "Mare Nostrum: Empires – Atlas Expansion",
            "Martian Dice",
            "Medina",
            "Memoir '44",
            "Mexica",
            "Mice and Mystics",
            "Milestones",
            "Mission: Red Planet (Second Edition)",
            "Monikers",
            "Morels",
            "Mottainai",
            "Mr. Jack",
            "Mr. Jack Extension",
            "My Village",
            "Mystic Vale",
            "Mythos Tales",
            "Mythotopia",
            "Nations",
            "Nations: The Dice Game",
            "The New Era",
            "New York 1901",
            "No Thanks!",
            "One Night Revolution",
            "One Night Ultimate Werewolf",
            "One Night Ultimate Werewolf - Daybreak",
            "Onirim",
            "Onitama",
            "Order of the Gilded Compass",
            "Orléans",
            "Orléans: Invasion",
            "Outside the Scope of BGG",
            "Pandemic",
            "Pandemic Legacy: Season 1",
            "Pandemic: Contagion",
            "Pandemic: In the Lab",
            "Pandemic: On the Brink",
            "Pandemic: Reign of Cthulhu",
            "Pandemic: State of Emergency",
            "Pandemic: The Cure",
            "Paperback",
            "Patchwork",
            "Pathfinder Adventure Card Game: Rise of the Runelords – Adventure Deck 2: The Skinsaw Murders",
            "Pathfinder Adventure Card Game: Rise of the Runelords – Adventure Deck 3: The Hook Mountain Massacre",
            "Pathfinder Adventure Card Game: Rise of the Runelords – Adventure Deck 4: Fortress of the Stone Giants",
            "Pathfinder Adventure Card Game: Rise of the Runelords – Adventure Deck 5: Sins of the Saviors",
            "Pathfinder Adventure Card Game: Rise of the Runelords – Adventure Deck 6: Spires of Xin-Shalast",
            "Pathfinder Adventure Card Game: Rise of the Runelords – Base Set",
            "Pathfinder Adventure Card Game: Rise of the Runelords – Character Add-On Deck",
            "Pathfinder Adventure Card Game: Skull & Shackles – \"Ranzak\" Promo Character Card Set",
            "Pathfinder Adventure Card Game: Skull & Shackles – Base Set",
            "Pathfinder Adventure Card Game: Skull & Shackles – Character Add-On Deck",
            "Pathfinder Adventure Card Game: Skull & Shackles Adventure Deck 2 – Raiders of the Fever Sea",
            "Pathfinder Adventure Card Game: Skull & Shackles Adventure Deck 3 – Tempest Rising",
            "Pathfinder Adventure Card Game: Skull & Shackles Adventure Deck 4 –  Island of Empty Eyes",
            "Pathfinder Adventure Card Game: Wrath of the Righteous – Base Set",
            "Pathfinder Adventure Card Game: Wrath of the Righteous – Character Add-On Deck",
            "Peptide: A Protein Building Game",
            "Power Grid",
            "Power Grid",
            "Power Grid: France/Italy",
            "Power Grid: The Robots",
            "Prime Climb",
            "Prophecy",
            "Prosperity",
            "Puerto Rico",
            "Puerto Rico: Expansion I – New Buildings",
            "Quadropolis",
            "Queen's Architect",
            "Qwirkle",
            "Ra: The Dice Game",
            "Race for the Galaxy",
            "Race for the Galaxy: Alien Artifacts",
            "Race for the Galaxy: Rebel vs Imperium",
            "Race for the Galaxy: The Gathering Storm",
            "Race for the Galaxy: Xeno Invasion",
            "Railways of Europe",
            "Railways of the World",
            "Railways of the World: Event Deck",
            "The Resistance",
            "The Resistance: Avalon",
            "The Resistance: Hidden Agenda & Hostile Intent",
            "Rivals for Catan",
            "Rivals for Catan: Age of Darkness",
            "The Rivals for Catan: Age of Enlightenment",
            "Robinson Crusoe: Adventures on the Cursed Island",
            "Robinson Crusoe: Adventures on the Cursed Island – Voyage of the Beagle (Vol. 1)",
            "Roll For It!",
            "Roll for the Galaxy",
            "Roll for the Galaxy: Ambition",
            "Roll Through the Ages: The Bronze Age",
            "Roll Through the Ages: The Iron Age",
            "Romance of the Nine Empires",
            "Run, Fight, or Die!",
            "Russian Railroads",
            "Saboteur",
            "Saboteur 2",
            "Sail to India",
            "Samurai",
            "Schotten Totten",
            "Scoville",
            "Scythe",
            "Seasons",
            "Secret Hitler",
            "Shadow Hunters",
            "Shadowrift",
            "Shadowrift: Archfiends",
            "Shadowrun: Crossfire",
            "Sheriff of Nottingham",
            "Sherlock Holmes Consulting Detective: The Thames Murders & Other Cases",
            "Ships",
            "Signorie",
            "San Juan",
            "Smash Up",
            "Smash Up: Monster Smash",
            "Smash Up: Science Fiction Double Feature",
            "Smash Up: The Big Geeky Box",
            "Snow Tails",
            "Space Alert",
            "Space Hulk (fourth edition)",
            "Space Hulk: Death Angel – The Card Game",
            "Space Hulk: Death Angel – The Card Game – Mission Pack 1",
            "Space Hulk: Death Angel – The Card Game: Space Marine Pack 1",
            "Space Hulk: Death Angel – The Card Game: Tyranid Enemy Pack",
            "Splendor",
            "Spyfall",
            "Spyrium",
            "Star Realms",
            "Star Realms: Crisis – Bases & Battleships",
            "Star Realms: Crisis – Events",
            "Star Realms: Crisis – Fleets & Fortresses",
            "Star Realms: Crisis – Heroes",
            "Star Trek Deck Building Game: The Next Generation",
            "Star Trek Deck Building Game: The Next Generation – Next Phase",
            "Star Trek Deck Building Game: The Original Series",
            "Star Trek Panic",
            "Star Trek: Catan",
            "Star Trek: Expeditions",
            "Star Trek: Expeditions – Expansion Set",
            "Star Trek: Fleet Captains",
            "Star Trek: Frontiers",
            "Starfighter",
            "Steampunk Rally",
            "Stockpile",
            "Stone Age",
            "Stronghold (2nd edition)",
            "Subdivision",
            "Suburbia",
            "Suburbia Inc",
            "Summoner Wars",
            "Summoner Wars: Alliances Master Set",
            "Summoner Wars: Fallen Kingdom Faction Deck",
            "Summoner Wars: Guild Dwarves vs Cave Goblins",
            "Summoner Wars: Master Set",
            "Summoner Wars: Mercenaries Faction Deck",
            "Summoner Wars: Phoenix Elves vs Tundra Orcs",
            "Summoner Wars: Vanguards Faction Deck",
            "Survive: Escape from Atlantis!",
            "Survive: Escape from Atlantis! - 5-6 Player Mini Expansion",
            "Survive: Escape from Atlantis! - Dolphins & Dive Dice Mini Extension",
            "Survive: Space Attack!",
            "Sushi Go!",
            "T.I.M.E Stories",
            "Tail Feathers",
            "Takenoko",
            "Tales of the Arabian Nights",
            "Talisman (Revised 4th Edition)",
            "Talisman (Revised 4th Edition): The Cataclysm Expansion",
            "Talisman (Revised 4th Edition): The City Expansion",
            "Talisman (Revised 4th Edition): The Dragon Expansion",
            "Talisman (Revised 4th Edition): The Dungeon Expansion",
            "Talisman (Revised 4th Edition): The Highland Expansion",
            "Talisman (Revised 4th Edition): The Reaper Expansion",
            "Talisman (Revised 4th Edition): The Sacred Pool Expansion",
            "Talisman (Revised 4th Edition): The Woodland Expansion",
            "Targi",
            "Tenka: Shogun Edition",
            "Terraforming Mars",
            "A Terrible Time",
            "Terra Mystica",
            "Terra Mystica: Fire & Ice",
            "Through the Ages: A New Story of Civilization",
            "Through the Ages: A Story of Civilization",
            "Thunderstone Advance: Caverns of Bane",
            "Thunderstone Advance: Into the Abyss",
            "Thunderstone Advance: Numenera",
            "Thunderstone Advance: Root of Corruption",
            "Thunderstone Advance: Towers of Ruin",
            "Thunderstone Advance: Worlds Collide",
            "Ticket to Ride",
            "Ticket to Ride Map Collection: Volume 5 – United Kingdom & Pennsylvania",
            "Ticket to Ride: 10th Anniversary",
            "Ticket to Ride: India & Switzerland",
            "Ticket to Ride: Märklin",
            "Ticket to Ride: Nordic Countries",
            "Ticket to Ride: Rails & Sails",
            "Ticket to Ride: USA 1910",
            "Tides of Time",
            "Tigris & Euphrates",
            "Timeline: Inventions",
            "Tiny Epic Defenders",
            "Tokaido",
            "Tokaido: Crossroads",
            "Town Center",
            "Tragedy Looper",
            "Trains",
            "Trains: Gen Con 2013",
            "Trains: Gen Con 2014",
            "Trains: Map Pack 1 – Germany/Northeastern USA",
            "Trains: Rising Sun",
            "Trajan",
            "Treasure Chest",
            "Trickerion: Legends of Illusion",
            "Trieste",
            "Tsuro",
            "Tsuro of the Seas",
            "The Twelve Doctors: Doctor Who Card Game",
            "Twilight Struggle",
            "Two Rooms and a Boom",
            "Tzolk'in: The Mayan Calendar",
            "Tzolk'in: The Mayan Calendar – Tribes & Prophecies",
            "Valeria: Card Kingdoms",
            "Valley of the Kings: Afterlife",
            "Viceroy",
            "Village",
            "Village: Inn",
            "Village: Port",
            "Viticulture",
            "Viticulture: Tuscany – Expand the World of Viticulture",
            "The Voyages of Marco Polo",
            "Warband: Against the Darkness",
            "Warfighter: Expansion #1 – Reloading!",
            "Warfighter: Expansion #2 – Stealth",
            "Warfighter: Expansion #3 – Support",
            "Warfighter: The Tactical Special Forces Card Game",
            "Warfighter: The WWII Tactical Combat Card Game",
            "Warhammer 40,000: Conquest",
            "Warhammer Quest: The Adventure Card Game",
            "Welcome to the Dungeon",
            "Wits & Wagers",
            "Wits & Wagers Family",
            "Wits & Wagers Party",
            "XCOM: The Board Game",
            "XenoShyft: Onslaught",
            "Zombicide",
            "Zombicide: Prison Outbreak",
            "Zombicide: Toxic City Mall",
            "Zombie Dice"
        ]),
        'description' => $faker->text,
        'inventory' => rand(5, 50),
        'price' => $faker->randomFloat(2, 5, 100),
        'sold' => 0,
    ];
});
