<?php

use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movie = new App\Movie();
        $movie->name = 'Kill Bill: Vol. 1';
        $movie->sinopsis = 'An assassin is shot by her ruthless employer, Bill, and other members of their assassination circle – but she lives to plot her vengeance.';
        $movie->status = true;
        $movie->classification_id = 5;
        $movie->save();
        $movie->genres()->attach([1, 6]);

        $movie = new App\Movie();
        $movie->name = 'Star Trek: First Contact';
        $movie->sinopsis = 'The Borg, a relentless race of cyborgs, are on a direct course for Earth. Violating orders to stay away from the battle, Captain Picard and the crew of the newly-commissioned USS Enterprise E pursue the Borg back in time to prevent the invaders from changing Federation history and assimilating the galaxy.';
        $movie->status = true;
        $movie->classification_id = 2;
        $movie->save();
        $movie->genres()->attach([1, 2, 15, 17]);

        $movie = new App\Movie();
        $movie->name = 'A Whisker Away';
        $movie->sinopsis = 'Miyo "Muge" Sasaki is a peculiar second-year junior high student who has fallen in love with her classmate Kento Hinode. Muge resolutely pursues Kento every day, but he takes no notice of her. Nevertheless, while carrying a secret she can tell no one, Muge continues to pursue Kento. Muge discovers a magic mask that allows her to transform into a cat named Tarō. The magic lets Muge get close to Kento, but eventually it may also make her unable to transform back to a human.';
        $movie->status = true;
        $movie->classification_id = 2;
        $movie->save();
        $movie->genres()->attach([3, 7, 9, 14]);

        $movie = new App\Movie();
        $movie->name = 'The Lorax';
        $movie->sinopsis = 'A 12-year-old boy searches for the one thing that will enable him to win the affection of the girl of his dreams. To find it he must discover the story of the Lorax, the grumpy yet charming creature who fights to protect his world.';
        $movie->status = true;
        $movie->classification_id = 2;
        $movie->save();
        $movie->genres()->attach([3, 8]);

        $movie = new App\Movie();
        $movie->name = 'Dial M for Murder';
        $movie->sinopsis = 'An ex-tennis pro carries out a plot to have his wife murdered after discovering she is having an affair, and assumes she will soon leave him for the other man anyway. When things go wrong, he improvises a new plan—to frame her for murder instead.';
        $movie->status = true;
        $movie->classification_id = 4;
        $movie->save();
        $movie->genres()->attach([6, 7, 13, 17]);

        $movie = new App\Movie();
        $movie->name = 'Arrival';
        $movie->sinopsis = 'Taking place after alien crafts land around the world, an expert linguist is recruited by the military to determine whether they come in peace or are a threat.';
        $movie->status = true;
        $movie->classification_id = 2;
        $movie->save();
        $movie->genres()->attach([7, 13, 15]);

        $movie = new App\Movie();
        $movie->name = 'The Shining';
        $movie->sinopsis = 'Jack Torrance accepts a caretaker job at the Overlook Hotel, where he, along with his wife Wendy and their son Danny, must live isolated from the rest of the world for the winter. But they aren`t prepared for the madness that lurks within.';
        $movie->status = true;
        $movie->classification_id = 5;
        $movie->save();
        $movie->genres()->attach([11, 17]);

        $movie = new App\Movie();
        $movie->name = 'Babyteeth';
        $movie->sinopsis = 'When seriously ill teenager Milla falls madly in love with smalltime drug dealer Moses, it’s her parents’ worst nightmare. But as Milla’s first brush with love brings her a new lust for life, things get messy and traditional morals go out the window. Milla soon shows everyone in her orbit – her parents, Moses, a sensitive music teacher, a budding child violinist, and a disarmingly honest, pregnant neighbour – how to live like you have nothing to lose. What might have been a disaster for the Finlay family instead leads to letting go and finding grace in the glorious chaos of life. Babyteeth joyously explores how good it is not to be dead yet and how far we will go for love.';
        $movie->status = true;
        $movie->classification_id = 2;
        $movie->save();
        $movie->genres()->attach([5, 7]);

        $movie = new App\Movie();
        $movie->name = 'Captain America: Civil War';
        $movie->sinopsis = 'Following the events of Age of Ultron, the collective governments of the world pass an act designed to regulate all superhuman activity. This polarizes opinion amongst the Avengers, causing two factions to side with Iron Man or Captain America, which causes an epic battle between former allies.';
        $movie->status = true;
        $movie->classification_id = 2;
        $movie->save();
        $movie->genres()->attach([1, 2, 15]);

        $movie = new App\Movie();
        $movie->name = 'Inside Out';
        $movie->sinopsis = 'Growing up can be a bumpy road, and it`s no exception for Riley, who is uprooted from her Midwest life when her father starts a new job in San Francisco. Riley`s guiding emotions— Joy, Fear, Anger, Disgust and Sadness—live in Headquarters, the control centre inside Riley`s mind, where they help advise her through everyday life and tries to keep things positive, but the emotions conflict on how best to navigate a new city, house and school.';
        $movie->status = true;
        $movie->classification_id = 2;
        $movie->save();
        $movie->genres()->attach([3, 5, 7, 8]);

        $movie = new App\Movie();
        $movie->name = 'Parasite';
        $movie->sinopsis = 'All unemployed, Ki-taek`s family takes peculiar interest in the wealthy and glamorous Parks for their livelihood until they get entangled in an unexpected incident.';
        $movie->status = true;
        $movie->classification_id = 5;
        $movie->save();
        $movie->genres()->attach([5, 7, 17]);

        $movie = new App\Movie();
        $movie->name = '1917';
        $movie->sinopsis = 'At the height of the First World War, two young British soldiers must cross enemy territory and deliver a message that will stop a deadly attack on hundreds of soldiers.';
        $movie->status = true;
        $movie->classification_id = 5;
        $movie->save();
        $movie->genres()->attach([1,7,10,18]);

        $movie = new App\Movie();
        $movie->name = 'Halloween';
        $movie->sinopsis = 'Jamie Lee Curtis returns to her iconic role as Laurie Strode, who comes to her final confrontation with Michael Myers, the masked figure who has haunted her since she narrowly escaped his killing spree on Halloween night four decades ago.';
        $movie->status = true;
        $movie->classification_id = 5;
        $movie->save();
        $movie->genres()->attach([11]);
    }
}
