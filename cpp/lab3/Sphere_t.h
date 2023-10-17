#pragma once

#include "Point_t.h"

class Sphere_t {
private:
    Point_t cntr;
    double radius;
public:
    Sphere_t();
    Point_t get_cntr();
    double get_radius();
    void print();
    double volume();
	double area();
    
};