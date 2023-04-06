import React from 'react';
import './Cards.css';
import CardItem from './CardItem';

function Cards() {
  return (
    <div className='cards'>
      <h1>Check out these BENEFITS of our Tool!</h1>
      <div className='cards__container'>
        <div className='cards__wrapper'>
          <ul className='cards__items'>
            <CardItem
              src='images/img-1.jpg'
              text='Centralized platform for all users'
              label='Learn More'
              path='/services'
            />
            <CardItem
              src='images/img-2.jpg'
              text='Effective collaboration and communiation'
              label='Learn More'
              path='/services'
            />
          </ul>
          <ul className='cards__items'>
            <CardItem
              src='images/img-3.jpg'
              text='Access your projects and tasks from anywhere'
              label='Learn More'
              path='/services'
            />
            <CardItem
              src='images/img-4.jpg'
              text='Deliver high quality work on time'
              label='Learn More'
              path='/products'
            />
            <CardItem
              src='images/img-5.jpg'
              text='Visualize your project with gantt charts and timelines'
              label='Learn More'
              path='/sign-up'
            />
          </ul>
        </div>
      </div>
    </div>
  );
}

export default Cards;