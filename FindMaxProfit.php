<?php

class FindMaxProfit
{
  public const MAX_PROBABILITY_BY_ANY_PRODUCT = 0; 
  public const MAX_PROBABILITY_BY_FIRST_PRODUCT = 1; 
  public const MAX_PROBABILITY_BY_SECOND_PRODUCT = 2; 
  
  public static function findMaxProfitByProductandPrice($argv)
  {
    if (count($argv) > 6)
    {
      echo "Arguments should not be more than 5. Firts 3 arguments should be product quantity and last 2 are product price in respective to product order quantity.";
    }

    $bread = (int)$argv[1];
    $firstProductQuantity = (int)$argv[2];
    $secondProductQuantity = (int)$argv[3];
    $firstProductPrice = (int)$argv[4];
    $secondProductPrice = (int)$argv[5];

    $maxPossibilityByProduct = self::MAX_PROBABILITY_BY_ANY_PRODUCT;
    if (($firstProductQuantity * $firstProductPrice) > ($secondProductQuantity * $secondProductPrice))
    {
      $maxPossibilityByProduct = self::MAX_PROBABILITY_BY_FIRST_PRODUCT;
    }
    elseif (($firstProductQuantity * $firstProductPrice) < ($secondProductQuantity * $secondProductPrice))
    {
      $maxPossibilityByProduct = self::MAX_PROBABILITY_BY_SECOND_PRODUCT;
    }

    $output = 0;
    if ($maxPossibilityByProduct == self::MAX_PROBABILITY_BY_SECOND_PRODUCT)
    {
      $output = $secondProductQuantity * $secondProductPrice;
      $bread = $bread - (2*$secondProductQuantity);
    }
    elseif ($maxPossibilityByProduct == self::MAX_PROBABILITY_BY_FIRST_PRODUCT)
    {
      $output = $firstProductQuantity * $firstProductPrice;
      $bread = $bread - (2*$firstProductQuantity);
    }
    else
    {
      $output = $firstProductQuantity * $firstProductPrice;
      $bread = $bread - (2*$firstProductQuantity);
    }

    if ($bread >= 2)
    {
      if ($maxPossibilityByProduct == self::MAX_PROBABILITY_BY_SECOND_PRODUCT)
      {
        $firstProduct = 1;
        for ($i = 0; $i <= $bread; $i=$i+2)
        {
          if ($firstProduct <= $firstProductQuantity)
          {
            $output += 1 * $firstProductPrice;
            $bread = $bread - 2;
            $firstProduct++;
          }
         
        }
      }
      elseif ($maxPossibilityByProduct == self::MAX_PROBABILITY_BY_FIRST_PRODUCT)
      {
        $secondProduct = 1;
        for ($i = 0; $i <= $bread; $i=$i+2)
        {
          if ($secondProduct <= $secondProductQuantity) 
          {
            $output +=1 * $secondProductPrice;
            $bread = $bread - 2;
            $secondProduct++;
          }
        }
      }
      else
      {
        $firstProduct = 1;
        for ($i = 0; $i <= $bread; $i=$i+2)
        {
          if ($firstProduct <= $firstProductQuantity)
          {
            $output += 1 * $firstProductPrice;
            $bread = $bread - 2;
            $firstProduct++;
          }
        }
      }
    }
    
      return  $output;
    
  }
}
         
echo FindMaxProfit::findMaxProfitByProductandPrice($argv);

?>