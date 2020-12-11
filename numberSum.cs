using System;

namespace numberSum
{
    class Program
    {
        static void Main(string[] args)
        {   int readNumber=0;
            int readSecondNumber=0;
            int sum = 0;
            
            Console.WriteLine("Give first number:");
            readNumber = Convert.ToInt32(Console.ReadLine());
            Console.WriteLine("Give the second number:");
            readSecondNumber = Convert.ToInt32(Console.ReadLine());
            if (readNumber > readSecondNumber) {
                Console.WriteLine(readNumber + " is " + " bigger "+"than "+readSecondNumber);
            } else if (readNumber < readSecondNumber) {
                Console.WriteLine(readNumber + " is " + " smaller "+"than "+readSecondNumber);
            } else {
                Console.WriteLine("Both numbers are equal!\n");
            }
            
            sum = readNumber + readSecondNumber;
            Console.WriteLine("The sum of numbers is " + sum+ ".");
        }
    }
}
