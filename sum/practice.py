def absolute(fn):
    def wrap(*args):
        abs_args = []
        for arg in args:
            abs_arg = abs(arg)
            abs_args.append(abs_arg)
        # mylist = [ abs(i) for i in args ]
        # mylist = map(abs, args)
        return fn(*abs_args)
    return wrap

@absolute
def my_sum(*args):
    sum_val = 0
    for arg in args:
        sum_val += arg
    return sum_val
    # return sum(args)

print( my_sum(1,-2,-3,4) )