using System;

namespace guessGame
{
    class Program
    {
        static void Main(string[] args) {
               
            int fails = 0;
            int tries=3;
            Boolean won = false;
            Random rand = new Random();

            while (tries > fails && won==false) {

                int random = rand.Next(0,10);
                Console.WriteLine("Guess the number:");
                int number = int.Parse(Console.ReadLine());

                if (fails < tries && number!=random) {
                    Console.WriteLine("You guessed wrong! Try again!");
                    fails++;
                }   else if (fails < tries && number==random) {
                    won = true;
                }     
            } 

            if (fails < tries) {
                Console.WriteLine("You won!");
            } else {
                Console.WriteLine("You lost!");
            }
        }
    }
}
