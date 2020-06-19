<?php

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre = new App\Genre();
        $genre->name = 'Action';
        $genre->description = 'Action film is a film genre in which the protagonist or protagonists are thrust into a series of events that typically include violence, extended fighting, physical feats and frantic chases.';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'Adventure';
        $genre->description = 'Adventure films are a genre of film that typically use their action scenes to display and explore exotic locations in an energetic way.';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'Animation';
        $genre->description = 'Animation is classified as a genre by many film critics and streaming services, there is an ongoing debate between the animation community and the general public whether animation is a genre or a medium; and that the genres in the "Live-action scripted" genre can also be portrayed in an animated format, and the below kinds of animation are not types of stories, but simply types of ways that a film can be animated.';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'Biography';
        $genre->description = 'Generalized as a historical writen by someone and documented';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'Comedy';
        $genre->description = 'Comedy is a story that tells about a series of funny, or comical events, intended to make the audience laugh. It is a very open genre, and thus crosses over with many other genres on a frequent basis.';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'Crime';
        $genre->description = 'A crime story is about a crime that is being committed or was committed. It can also be an account of a criminals life. It often falls into the action or adventure genres.';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'Drama';
        $genre->description = 'Within film, television and radio (but not theatre), drama is a genre of narrative fiction (or semi-fiction) intended to be more serious than humorous in tone, focusing on in-depth development of realistic characters who must deal with realistic emotional struggles. A drama is commonly considered the opposite of a comedy, but may also be considered separate from other works of some broad genre, such as a fantasy.';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'Family';
        $genre->description = 'Family is often mixed with other genres but mixed with families as main characters';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'Fantasy';
        $genre->description = 'A fantasy story is about magic or supernatural forces, rather than technology (as science fiction) if it happens to take place in a modern or future era.';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'History';
        $genre->description = 'A story about a real person or event. Often, they are written in a text book format, which may or may not focus on solely that.';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'Horror';
        $genre->description = 'A horror story is told to deliberately scare or frighten the audience, through suspense, violence or shock. H. P. Lovecraft distinguishes two primary varieties in the "Introduction" to Supernatural Horror in Literature: 1) Physical Fear or the "mundanely gruesome" and 2) the true Supernatural Horror story or the "Weird Tale". The supernatural variety is occasionally called "dark fantasy", since the laws of nature must be violated in some way, thus qualifying the story as "fantastic".';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'Musical';
        $genre->description = 'Musical film is a film genre in which songs by the characters are interwoven into the narrative, sometimes accompanied by dancing.';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'Mystery';
        $genre->description = 'A mystery story follows an investigator as they attempt to solve a puzzle (often a crime). The details and clues are presented as the story continues and the protagonist discovers them and by the end of the story the mystery/puzzle is solved.';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'Romance';
        $genre->description = 'But most often a romance is understood to be "love stories", emotion-driven stories that are primarily focused on the relationship between the main characters of the story. Beyond the focus on the relationship, the biggest defining characteristic of the romance genre is that a happy ending is always guaranteed...';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'Sci-Fi';
        $genre->description = 'Science fiction is similar to fantasy, except stories in this genre use scientific understanding to explain the universe that it takes place in. It generally includes or is centered on the presumed effects or ramifications of computers or machines; travel through space, time or alternate universes; alien life-forms; genetic engineering; or other such things.';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'Sport';
        $genre->description = 'A sports film is a film genre that uses sport as the theme of the film. It is a production in which a sport, sporting event, athlete (and their sport), or follower of sport (and the sport they follow) are prominently featured, and which depend on sport to a significant degree for their plot motivation or resolution.';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'Thriller';
        $genre->description = 'A Thriller is a story that is usually a mix of fear and excitement. It has traits from the suspense genre and often from the action, adventure or mystery genres, but the level of terror makes it borderline horror fiction at times as well. It generally has a dark or serious theme, which also makes it similar to drama.';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'War';
        $genre->description = 'War film is a film genre concerned with warfare, typically about naval, air, or land battles, with combat scenes central to the drama. It has been strongly associated with the 20th century.';
        $genre->save();

        $genre = new App\Genre();
        $genre->name = 'Western';
        $genre->description = 'Stories in the Western genre are set in the American West, between the time of the Civil war and the early twentieth century.';
        $genre->save();
    }
}
