#include <iostream>

#include "Triangle_t.h"


int main() {

	Triangle_t t1;
	Triangle_t t2;

	std::cout << "Perimetr1 " << t1.perimetr() << std::endl;
	std::cout << "Perimetr2 " << t2.perimetr() << std::endl;

	return 0;
}