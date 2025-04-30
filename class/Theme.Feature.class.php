<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeFeature
{
	/**************************************************************************/
	
	function __construct()
	{	
		$this->style=array
		(
			'1'=>array(__('Style 1','autoride')),
			'2'=>array(__('Style 2','autoride')),
			'3'=>array(__('Style 3','autoride')),
		);
		
		$this->feature=array
		(
			'account'=>array(__('Account','autoride')),
			'airplane'=>array(__('Airplane','autoride')),
			'ambulance'=>array(__('Ambulance','autoride')),
			'award'=>array(__('Award','autoride')),
			'bag-1'=>array(__('Bag 1','autoride')),
			'bag-2'=>array(__('Bag 2','autoride')),
			'beach'=>array(__('Beach','autoride')),
			'boat'=>array(__('Boat','autoride')),
			'box-truck'=>array(__('Box truck','autoride')),
			'bus-1'=>array(__('Bus 1','autoride')),
			'bus-2'=>array(__('Bus 2','autoride')),
			'calculator'=>array(__('Calculator','autoride')),
			'calendar'=>array(__('Calendar','autoride')),
			'camper'=>array(__('Camper','autoride')),
			'car-1'=>array(__('Car 1','autoride')),
			'car-2'=>array(__('Car 2','autoride')),
			'car-3'=>array(__('Car 3','autoride')),
			'car-4'=>array(__('Car 4','autoride')),
			'car-5'=>array(__('Car 5','autoride')),
			'car-6'=>array(__('Car 6','autoride')),
			'car-7'=>array(__('Car 7','autoride')),
			'car-check'=>array(__('Car check','autoride')),
			'car-key'=>array(__('Car key','autoride')),
			'cart-bag'=>array(__('Cart bag','autoride')),
			'certificate'=>array(__('Certificate','autoride')),
			'chat'=>array(__('Chat','autoride')),
			'check'=>array(__('Check','autoride')),
			'city-1'=>array(__('City 1','autoride')),
			'city-2'=>array(__('City 2','autoride')),
			'clock'=>array(__('Clock','autoride')),
			'colosseum'=>array(__('Colosseum','autoride')),
			'compass'=>array(__('Compass','autoride')),
			'country-side'=>array(__('Country side','autoride')),
			'credit-card'=>array(__('Credit card','autoride')),
			'delivery'=>array(__('Delivery','autoride')),
			'disabled'=>array(__('Disabled','autoride')),
			'document'=>array(__('Document','autoride')),
			'driver'=>array(__('Driver','autoride')),
			'email-1'=>array(__('Email 1','autoride')),
			'email-2'=>array(__('Email 2','autoride')),
			'email-3'=>array(__('Email 3','autoride')),
			'error'=>array(__('Error','autoride')),
			'fax'=>array(__('Fax','autoride')),
			'food-truck'=>array(__('Food truck','autoride')),
			'garage'=>array(__('Garage','autoride')),
			'globe-search'=>array(__('Globe search','autoride')),
			'hand-bag'=>array(__('Hand bag','autoride')),
			'helicopter'=>array(__('Helicopter','autoride')),
			'help'=>array(__('Help','autoride')),
			'house'=>array(__('House','autoride')),
			'information'=>array(__('Infomation','autoride')),
			'leaf'=>array(__('Leaf','autoride')),
			'lighthouse'=>array(__('Lighthouse','autoride')),
			'location-1'=>array(__('Location 1','autoride')),
			'location-2'=>array(__('Location 2','autoride')),
			'location-3'=>array(__('Location 3','autoride')),
			'map'=>array(__('Map','autoride')),
			'map-search'=>array(__('Map search','autoride')),
			'medical-bed'=>array(__('Medical bed','autoride')),
			'network'=>array(__('Network','autoride')),
			'network-search'=>array(__('Network search','autoride')),
			'office'=>array(__('Office','autoride')),
			'paper-plane'=>array(__('Paper plane','autoride')),
			'party'=>array(__('Party','autoride')),
			'pen'=>array(__('Pen','autoride')),
			'pencil'=>array(__('Pencil','autoride')),
			'people'=>array(__('People','autoride')),
			'phone-1'=>array(__('Phone 1','autoride')),
			'phone-3'=>array(__('Phone 3','autoride')),
			'picture'=>array(__('Picture','autoride')),
			'price'=>array(__('Price','autoride')),
			'radioactive-truck'=>array(__('Radioactive truck','autoride')),
			'recurring-1'=>array(__('Recurring 1','autoride')),
			'recurring-2'=>array(__('Recurring 2','autoride')),
			'road'=>array(__('Road','autoride')),
			'road-pin'=>array(__('Road pin','autoride')),
			'route-1'=>array(__('Route 1','autoride')),
			'route-2'=>array(__('Route 2','autoride')),
			'share-time'=>array(__('Share time','autoride')),
			'ship-1'=>array(__('Ship 1','autoride')),
			'ship-2'=>array(__('Ship 2','autoride')),
			'sign'=>array(__('Sign','autoride')),
			'sport'=>array(__('Sport','autoride')),
			'sync'=>array(__('Sync','autoride')),
			'testimonials-1'=>array(__('Testimonials 1','autoride')),
			'testimonials-2'=>array(__('Testimonials 2','autoride')),
			'timetable'=>array(__('Timetable','autoride')),
			'train'=>array(__('Train','autoride')),
			'truck'=>array(__('Truck','autoride')),
			'truck-dump'=>array(__('Truck dump','autoride')),
			'vip'=>array(__('Vip','autoride')),
			'wallet'=>array(__('Wallet','autoride')),
			'warning'=>array(__('Warning','autoride'))
		);
	}
	
	/**************************************************************************/
	
	function getFeature()
	{
		return($this->feature);
	}
	
	/**************************************************************************/
	
	function isFeature($name)
	{
		return(array_key_exists($name,$this->feature));
	}
	
	/**************************************************************************/
	
	function getStyle()
	{
		return($this->style);
	}
	
	/**************************************************************************/
	
	function isStyle($name)
	{
		return(array_key_exists($name,$this->getStyle()));
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/