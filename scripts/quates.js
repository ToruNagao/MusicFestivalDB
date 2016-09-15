var quates = [
    '"One good thing about music, when it hits you, you feel no pain." - Bob Marley',
    '"Music is my religion." - Jimi Hendrix',
    '"And I\'ll keep listening to the great Joe Strummer cause through music we can live forever." - Tim Armstrong',
    '"Music is a thing that changes people\'s lives. It has the capacity to make young people\'s lives better." - Noel Gallagher',
    '"Being in a band turns you into a child and keeps you there." - Thom Yorke',
    '"I wanted to prove the sustaining power of music." - David Bowie',
    '"Love is the flower you\'ve got to let grow." - John Lennon',
    '"People can change anything they want to, and that means everything in the world." - Joe Strummer',
    '"When I got the music, I got a place to go." - Tim Armstrong.',
    '"Music expresses what cannot be put into words I like to think, and I think the band makes a good go at it." - Steven Tyler',
    '"I know what I\'ve done for music, but don\'t call me a legend. Just call me Miles Davis." - Miles Davis',
    '"Music is a safe kind of high." - Jimi Hendrix',
    '"There are only two categories in music: soulful and non-soulful." - Flea',
    '"I don\'t think punk ever really dies, because punk rock attitude can never die." - Billy Idol',
    '"To me, punk is about being an individual and going against the grain and standing up and saying \'This is who I am\'." - Joey Ramone',
    '"Music, once admitted to the soul, becomes a sort of spirit, and never dies." - Edward Bulwer-Lytton',
    '"Music acts like a magic key, to which the most tightly closed heart opens." - Maria Augusta von Trapp',
    '"Music can change the world because it can change people." - Bono',
    '"None but ourselves can free our minds." - Bob Merley',
    '"The music is not in the notes, but in the silence between." - Wolfgang Amadeus Mozart',
    '"Music is the divine way to tell beautiful, poetic things to the heart." - Pablo Casals',
    '"I don\'t try to just be a blues singer - I try to be an entertainer. That has kept me going." - B. B. King',
    '"Blues is easy to play, but hard to feel." - Jimi Hendrix',
    '"Hip-Hop isn\'t just music, it is also a spiritual movement of the blacks! You can\'t just call Hip-Hop a trend!" - Lauryn Hill',
    '"Love yourself and your expression, you can\'t go wrong." - KRS-One',
    '"Life is art, a miracle for all to believe, I must tell you that you lived beautifully" - Shing02',
    '"The memory of things gone is important to a jazz musician." - Louis Armstrong',
    '"What we play is life" - Louis Armstrong',
    '"I would say that jazz is my own language." - Amy Whitehouse',
    '"Blues and soul and jazz music has so much pain, so much beauty of raw emotion and passion." - Christina Aguilera',
    '"Jazz was my first love" - Frankie Valli',
    '"Rock n\' roll is very special to me. It\'s my lifeblood." - Joey Ramone',
    '"Music is the mediator between the spiritual and the sensual life." - Ludwig van Beethoven',
    '"To live is to be musical, starting with the blood dancing in your veins. Everything living has a rhythm. Do you feel your music?" - Michael Jackson',
    '"Music is my life and my life is music. Anyone who does not understand this is not worthy of god." - Wolfgang Amadeus Mozart',
    '"Good music is good no matter what kind of music it is." - Miles Davis',
    '"I don\'t sing because I\'m happy; I\'m happy because I sing." - William James',
    '"Music is a world within itself, it is a language We all understand." - Stevie Wonder',
    '"No matter what language we speak, what color we are, '
    + 'the form of our politics or the expression of our love and our faith, music proves: We are the same." - John Denver',
    '"Music washes away from the soul the dust of everyday life." - Berthold Auerbach',
    '"Music gives a soul to the universe, wings to the mind, flight to the imagination, and life to everything." - Plato',
    '"Hip-hop has done more than any leader, politician, or anyone to improve race relations." - Jay-Z',
    '"My music will go on forever." - Bob Marley',
    '"Live the life you love. Love the life you live." - Bob Marley',
    '"One love, one heart, Let\'s get together and feel alright." - Bob Marley',
    '"The rhymes will heal cause I believe in music. In times of need I won\'t be leaving you sick. The beat plus the melody\'s the recipe.'
    + ' Hip-hop world wide we got to live in peace." - Shing02',
    '"I know that I\'ll be happier, and I know you will too. Eventually" - Kevin Parker'];


function printQuate(){
    document.write(quates[randomInt(0, quates.length)]);
}

function randomInt(min, max){
    return (Math.floor((Math.random() * max) + min));
}