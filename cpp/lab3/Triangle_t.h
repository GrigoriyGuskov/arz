#pragma once

#include "Point_t.h"

class Triangle_t {
private:
	Point_t p1;
	Point_t p2;
	Point_t p3;
public:
	Triangle_t();
	Point_t get_p1();
	Point_t get_p2();
	Point_t get_p3();
	void print();
	double perimetr();
	double area();

};