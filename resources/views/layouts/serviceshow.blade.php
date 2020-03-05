@extends('layouts.app')

<div>
        <form action="/action_page.php">
        <label for="lname">Service Name: </label>
        <select id="services" name="services">
            <option value="AC servicing">AC servicing</option>
            <option value="Plumbing">Plumbing</option>
            <option value="Cleaning">Cleaning</option>
            <option value="Pest Control">Pest Control</option>
          </select><br><br>
        <label for="lname">Categories: </label>
        <select id="services" name="services">
            <option value="AC installation/Uninstallation">AC installation/Uninstallation</option>
            <option value="tap changing">tap changing</option>
            <option value="carpet cleaning">carpet cleaning</option>
            <option value="sofa cleaning">sofa cleaning</option>
          </select><br><br>
        <input type="submit" value="Submit">
      </form>
